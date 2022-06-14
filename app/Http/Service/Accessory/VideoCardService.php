<?php

namespace App\Http\Service\Accessory;

use App\Http\Service\Service;
use App\Models\VideoCard;
use Auth;

class VideoCardService {

    protected $videoCardModel;
    protected $service;
    protected $success = 'success';
    protected $danger = 'danger';
    protected $columnsForGetFromDb = ['id', 'model', 'size'];
    protected $PermissionDenied = 'Permission denied';
    protected $successful = 'Successful';

    /**
     * @param PowerSupply $videoCardModel
     * @param Service $service
    */
    public function __construct(VideoCard $videoCardModel, Service $service)
    {
        $this->videoCardModel = $videoCardModel;
        $this->service = $service;
    }

    /**
     * @return array
    */
    public function getColumnsFromTable() {
        if(Auth::user()->can('create', VideoCard::class)){
            $arrayWithColumns = $this->columnsForGetFromDb;
            unset($arrayWithColumns['id']);
            return $arrayWithColumns;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    /**
     * @param array $arrayToStore
     * @return array
    */
    public function storeInDb(array $arrayToStore){
        if(Auth::user()->can('create', VideoCard::class)){
            unset($arrayToStore['_token']);
            foreach($arrayToStore as $column => $value) {
                $this->videoCardModel[$column] = $value;
            }
            if ($this->videoCardModel->save()) {
                return [$this->success => $this->successful];
            }
            return [$this->danger => 'Save failed']; 
        }
        return [$this->danger => $this->PermissionDenied];

    }

    /**
     * @param array $request
     * @param int $id
     * @return array
    */
    public function updateInDb(array $request, int $id) {
        if(Auth::user()->can('update', VideoCard::class)){
            $videoCard = $this->getDataFromDb($id);
            unset($request['_method']);
            unset($request['_token']);
            foreach($request as $item => $value) {
                $videoCard->$item = $value;
            }
            if($videoCard->save()) {
                return [$this->success => $this->successful];
            }
            return [$this->danger => 'Save failed']; 
        }
        return [$this->danger => $this->PermissionDenied];
    }

    /**
     * @param String $id ID Motherboard in DB
     * @return Array
     */
    public function deleteDataFromDb(int $id)
    {
        
        if(!(Auth::user()->can('delete', VideoCard::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $videoCard = $this->getDataFromDb($id);
        if (!($videoCard->delete())){
            return [$this->danger => 'Delete failed'];
        }
        return [$this->success => $this->successful];
    }

    /**
     * @param int $id
    */
    public function getDataFromDb(int $id = 0)
    {
        if(Auth::user()->can('update', VideoCard::class)){
            if ($id) {
                $videoCard = VideoCard::where('id', $id)
                    ->select($this->columnsForGetFromDb)
                    ->firstOrFail();
            } else {
                $videoCard = VideoCard::select($this->columnsForGetFromDb)->paginate(15);
            }
            return $videoCard;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAll() {
        if(Auth::user()->can('viewany', VideoCard::class)){
            $videoCard = $this->getDataFromDb();
            return $videoCard;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAllForAssemble() {
        $videoCard = VideoCard::select($this->columnsForGetFromDb)->get();
        return $videoCard;
    }

}