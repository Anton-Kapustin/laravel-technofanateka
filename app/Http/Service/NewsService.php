<?php

namespace App\Http\Service;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;




class NewsService {

    protected $newsModel;
    protected $service;
    protected $success = 'success';
    protected $successful = 'Successful';
    protected $PermissionDenied = 'Permission denied';
    protected $empty = 'Empty';
    protected $danger = 'danger';
    protected $saveFailed = 'Save failed';
    protected $deleteFailed = 'Delete failed';
    protected $newsColumnsForGetFromDb = ['id', 'title', 'title_image', 'body', 'user_id', 
        'updated_at', 'published', 'top_news'];
    protected $userColumnsForGetFromDB = 'user:id,first_name,last_name';

    /**
     * @param News $newsModel
     * @param Service $service
    */
    public function __construct(News $newsModel, Service $service)
    {
        $this->newsModel = $newsModel;
        $this->service = $service;
    }


    /**
     * @return Response
     */
     public function showNewsInAdminPanel()
     {
        $user = $this->getAuthUser();
        if (!($user->can('viewAny', News::class))) {
            $news = $this->getNewsByUserId($user->id);
            if (!($news)) {
                return [$this->danger => $this->PermissionDenied];
            }
            return $news;
        }
        $news = $this->get_news_from_db();
        if($news) {
            return $news;
        }
        return [$this->danger => $this->PermissionDenied];
     }    

    /**
     * @param Int $newsId ID news in DB
     * @return 
     */
    public function get_news_from_db(int $newsId = 0){
        $newsFromDb = 0;
        if ($newsId){
            $newsFromDb = News::where('id', $newsId)
                ->select($this->newsColumnsForGetFromDb)
                ->with('user:id,first_name,last_name')
                ->firstOrFail();
            $newsFromDb->user;

        } else {
            $newsFromDb = News::select($this->newsColumnsForGetFromDb)
                ->with('user:id,first_name,last_name')
                ->latest()
                ->paginate(10);
        }
        return $newsFromDb;
    }

    /**
     * @param Int $newsId ID news in DB
     * @return 
     */
     public function getPublishNews() 
     {
        $newsFromDb = News::where('published', 1)
            ->select($this->newsColumnsForGetFromDb)
            ->with('user:id,first_name,last_name')
            ->latest()
            ->paginate(10);
        return $newsFromDb;
     }    

    /**
     * @param Int $newsId ID news in DB
     * @return
     */
    public function getNewsByUserId(Int $userId)
    {
        $news = News::where('user_id', $userId)
            ->select($this->newsColumnsForGetFromDb)
            ->with($this->userColumnsForGetFromDB)
            ->latest()
            ->paginate(10);
        return $news;
    }


    /**
     * @param Int $newsId ID news in DB
     * @return
     */
    public function showEditNews(Int $newsId)
    {
        $user = $this->getAuthUser();
        $partOfNews = $this->get_news_from_db($newsId);
        if(!($user->can('update', $partOfNews))) {
            return [$this->danger => $this->PermissionDenied];
        }
        return $partOfNews;
    }

    /**
     * @param NewsStoreRequest $newsRequest 
     * @return Response
     */
    public function storeNewsInDb(NewsStoreRequest $newsRequest,  $newsColumnsWithType)
    {
        $user = $this->getAuthUser();
        if(!($user->can('create', News::class))) {
            return [$this->danger, 'No permission for do this'];
        }
        $requestArray = $newsRequest->all();
        unset($requestArray['_token']);
        $this->newsModel->user_id = Auth::user()->id;
        foreach ($newsColumnsWithType as $item => $type) {
            if($type === 'file') {
                $path = $requestArray[$item]->store('news', 'public');
                $path = preg_replace('/\w+\//', '', $path);
                $this->newsModel->$item = $path;
            } else {
                $this->newsModel->$item = $requestArray[$item];
            }
        }
        if ($this->newsModel->save()) {
            return [$this->success, $this->successful];
        }
        return [$this->danger, $this->saveFailed]; 
    }

    /**
     * @param Int $newsId ID news in DB
     * @return
     */
    public function updateNewsInDb(NewsUpdateRequest $newsRequest)
    {
        $user = $this->getAuthUser();
        $fileIndex = 'title_image';
        $news = News::where('id', $newsRequest->id)
            ->select($this->newsColumnsForGetFromDb)
            ->first();
        if(!($user->can('update', $news))) {
            return [$this->danger => $this->PermissionDenied];
        }
        $requestArray = $newsRequest->all();
        unset($requestArray['_token']);
        unset($requestArray['_method']);
        // dd($requestArray);
        foreach ($requestArray as $item => $partOfNews) {
            
            if ($item === $fileIndex) {
                if(isset($requestArray[$item])) {
                    $path = $requestArray[$item]->store('news', 'public');
                    $path = preg_replace('/\w+\//', '', $path);
                    // dd($this->deleteFile('public', '/news/'.$news->$item));

                    $news->$item = $path;
                } 
            } else {
                    $news->$item = $partOfNews;
            }
        }  
        if ($news->save()) {
            return [$this->success => $this->successful]; 
        }
        return [$this->danger => $this->saveFailed]; 
    }

    /**
     * @param String $newsId ID news in DB
     * @return Array
     */
    public function deleteNewsFromDb(String $newsId)
    {
        $partOfNews = $this->get_news_from_db($newsId);
        $user = $this->getAuthUser();
        if(!($user->can('delete', $partOfNews))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $pathToImage = $partOfNews->title_image;
        if (!($partOfNews->delete())){
            return [$this->danger => $this->deleteFailed];
        }
        if (!($this->deleteFile('public', '/news/'.$pathToImage))) {
            return [$this->danger => $this->deleteFailed];
        }
        return [$this->success => $this->successful];
    }


    /**
     * @param String $tableName ID news in DB
     * @param Int $publish
     * @return Array
     */
    public function changePublishNews(String $newsId, int $publish)
    {
        $user = $this->getAuthUser();
        if(!($user->can('publishNews', News::class))) {
            return [$this->danger, 'No permission for do this'];
        }
        $news = $this->get_news_from_db($newsId);
        $news->published = $publish;
        if ($news->save()) {
            return [$this->success => $this->successful];
        }
        return [$this->danger => 'Problem with update news'];
    }

    /**
     * @param String $tableName ID news in DB
     * @param Int $publish
     * @return Array
     */
    public function changeTopNews(String $newsId, int $isTopNews)
    {
        $user = $this->getAuthUser();
        if(!($user->can('changeTopNews', News::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $news = $this->get_news_from_db($newsId);
        $news->top_news = $isTopNews;
        if ($news->save()) {
            return [$this->success => $this->successful];
        }
        return [$this->danger => $this->saveFailed];
    }

    /**
     * @param String $tableName ID news in DB
     * @return Array
     */
    private function getAllColumnsFromTable(String $tableName) : Array
    {
        $arrayColumns = Schema::getColumnListing($tableName);
        return $arrayColumns;
    }

    /**
     * @return User
     */
    private function getAuthUser()
    {
        return Auth::user();
    }

    /**
     * @param String $tableName ID news in DB
     * @return Boolean
     */
    private function deleteFile(String $disk, String $path)
    {
        return Storage::disk($disk)->delete($path);
    }




    public static function replace_newline_by_tag($post)
    {
    $post_text = '';
    $p_tag = "<p>";
        $p_close_tag = "</p>";
    $array_sentences = preg_split("/\n/u", $post->body);
    foreach ($array_sentences as $key => $sentence) {
    $post_text = $post_text.$p_tag.$sentence.$p_close_tag;

    }
    $post->body = $post_text;
    return $post;
    }

}