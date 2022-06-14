<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsUpdateRequest;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Service\NewsService;
use App\Models\News;
use Illuminate\Http\Request;
Use Redirect;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;




class NewsController extends Controller
{

    protected $newsService;

    /**
     * @param NewsService newsService Create NewsService
     */
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->newsService->getPublishNews();
        return view('news', compact('news'));
    }

    public function indexAdmin()
    {
        $news = $this->newsService->showNewsInAdminPanel();
        if (isset($news['danger'])) {
            return Redirect::route('news')->with($partOfNews);
        }
        return view('newsAdmin', compact('news'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $structure = Config::get('structureNewsFormItems');
        return view('newsCreate', compact('structure'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\NewsStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsStoreRequest $newsRequest)
    {
        $structure = Config::get('structureNewsFormItems');
        $response = $this->newsService->storeNewsInDb($newsRequest, $structure);
        return Redirect::route('newsAdmin')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function show(int $news_id)
    {
        $partOfNews = $this->newsService->get_news_from_db($news_id);
        return view('partOfNews', compact('partOfNews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\String  $newsId
     * @return \Illuminate\Http\Response
     */
    public function edit(String $newsId)
    {
        $partOfNews = $this->newsService->showEditNews($newsId);
        if (isset($partOfNews['danger'])) {
            return Redirect::route('newsAdmin')->with($partOfNews);
        }
        $structure = Config::get('structureNewsFormItems');
        return view('newsEdit', compact('partOfNews', 'structure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $newsRequest)
    {
        $response = $this->newsService->updateNewsInDb($newsRequest);
        return Redirect::route('newsAdmin')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  String  $newsId
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $newsId)
    {
        $response = $this->newsService->deleteNewsFromDb($newsId);
        return Redirect::route('newsAdmin')->with($response);

    }

    /**
     * @param  String  $newsId
     * @return \Illuminate\Http\Response
     */
    public function publishNews(String $newsId)
    {
        $response = $this->newsService->changePublishNews($newsId, 1);
        return Redirect::route('newsAdmin')->with($response);

    }

    /**
     * @param  String  $newsId
     * @return \Illuminate\Http\Response
     */
    public function archiveNews(String $newsId)
    {
        $response = $this->newsService->changePublishNews($newsId, 0);
        return Redirect::route('newsAdmin')->with($response);

    }

    /**
     * @param  String  $newsId
     * @return \Illuminate\Http\Response
     */
    public function addToTopNews(String $newsId)
    {
        $response = $this->newsService->changeTopNews($newsId, 1);
        return Redirect::route('newsAdmin')->with($response);
    }

    /**
     * @param  String  $newsId
     * @return \Illuminate\Http\Response
     */
    public function deleteFromTopNews(String $newsId)
    {
        $response = $this->newsService->changeTopNews($newsId, 0);
        return Redirect::route('newsAdmin')->with($response);
    }
}
