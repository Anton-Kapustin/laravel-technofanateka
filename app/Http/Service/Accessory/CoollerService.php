<?php

namespace App\Http\Service\Accessory;

use App\Http\Service\Service;
use App\Models\Cooller;
use Auth;

class CoollerService {

    protected $coollerModel;
    protected $service;
    protected $success = 'success';
    protected $danger = 'danger';
    protected $columnsForGetFromDb = ['id', 'rpm', 'type', 'model'];
    protected $PermissionDenied = 'Permission denied';
    protected $successful = 'Successful';

    /**
     * @param cooller $coollerModel
     * @param Service $service
    */
    public function __construct(cooller $coollerModel, Service $service)
    {
        $this->coollerModel = $coollerModel;
        $this->service = $service;
    }

    /**
     * @return array
    */
    public function getColumnsFromTable() {
        if(Auth::user()->can('create', Cooller::class)){
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
        if(Auth::user()->can('create', Cooller::class)){
            unset($arrayToStore['_token']);
            foreach($arrayToStore as $column => $value) {
                $this->coollerModel[$column] = $value;
            }
            if ($this->coollerModel->save()) {
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
        if(Auth::user()->can('update', Cooller::class)){
            $cooller = $this->getDataFromDb($id);
            unset($request['_method']);
            unset($request['_token']);
            foreach($request as $item => $value) {
                $cooller->$item = $value;
            }
            if($cooller->save()) {
                return [$this->success => $this->successful];
            }
            return [$this->danger => 'Save failed']; 
        }
        return [$this->danger => $this->PermissionDenied];
    }

    /**
     * @param String $id ID cooller in DB
     * @return Array
     */
    public function deleteDataFromDb(int $id)
    {
        
        if(!(Auth::user()->can('delete', Cooller::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $cooller = $this->getDataFromDb($id);
        if (!($cooller->delete())){
            return [$this->danger => 'Delete failed'];
        }
        return [$this->success => $this->successful];
    }

    /**
     * @param int $id
    */
    public function getDataFromDb(int $id = 0)
    {
        if(Auth::user()->can('update', Cooller::class)){
            if ($id) {
                $cooller = Cooller::where('id', $id)
                    ->select($this->columnsForGetFromDb)
                    ->firstOrFail();
            } else {
                $cooller = Cooller::select($this->columnsForGetFromDb)->paginate(15);
            }
            return $cooller;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAll() {
        if(Auth::user()->can('viewany', Cooller::class)){
            $cooller = $this->getDataFromDb();
            return $cooller;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAllForAssemble() {
        $cooller = Cooller::select($this->columnsForGetFromDb)->get();
        return $cooller;
    }
}