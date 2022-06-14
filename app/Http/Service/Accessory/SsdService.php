<?php

namespace App\Http\Service\Accessory;

use App\Http\Service\Service;
use App\Models\Ssd;
use Auth;

class SsdService {

    protected $ssdModel;
    protected $service;
    protected $success = 'success';
    protected $danger = 'danger';
    protected $columnsForGetFromDb = ['id', 'model', 'memory_type', 'size'];
    protected $PermissionDenied = 'Permission denied';
    protected $successful = 'Successful';

    /**
     * @param PowerSupply $ssdModel
     * @param Service $service
    */
    public function __construct(Ssd $ssdModel, Service $service)
    {
        $this->ssdModel = $ssdModel;
        $this->service = $service;
    }

    /**
     * @return array
    */
    public function getColumnsFromTable() {
        if(Auth::user()->can('create', Ssd::class)){
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
        if(Auth::user()->can('create', Ssd::class)){
            unset($arrayToStore['_token']);
            foreach($arrayToStore as $column => $value) {
                $this->ssdModel[$column] = $value;
            }
            if ($this->ssdModel->save()) {
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
        if(Auth::user()->can('update', Ssd::class)){
            $ssd = $this->getDataFromDb($id);
            unset($request['_method']);
            unset($request['_token']);
            foreach($request as $item => $value) {
                $ssd->$item = $value;
            }
            if($ssd->save()) {
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
        
        if(!(Auth::user()->can('delete', Ssd::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $ssd = $this->getDataFromDb($id);
        if (!($ssd->delete())){
            return [$this->danger => 'Delete failed'];
        }
        return [$this->success => $this->successful];
    }

    /**
     * @param int $id
    */
    public function getDataFromDb(int $id = 0)
    {
        if(Auth::user()->can('update', Ssd::class)){
            if ($id) {
                $ssd = Ssd::where('id', $id)
                    ->select($this->columnsForGetFromDb)
                    ->firstOrFail();
            } else {
                $ssd = Ssd::select($this->columnsForGetFromDb)->paginate(15);
            }
            return $ssd;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAll() {
        if(Auth::user()->can('viewany', Ssd::class)){
            $ssd = $this->getDataFromDb();
            return $ssd;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAllForAssemble() {
        $ssd = Ssd::select($this->columnsForGetFromDb)->get();
        return $ssd;
    }
}