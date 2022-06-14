<?php

namespace App\Http\Service\Accessory;

use App\Http\Service\Service;
use App\Models\Hdd;
use Auth;

class HddService {

    protected $hddModel;
    protected $service;
    protected $success = 'success';
    protected $danger = 'danger';
    protected $columnsForGetFromDb = ['id', 'model', 'form_factor', 'size'];
    protected $PermissionDenied = 'Permission denied';
    protected $successful = 'Successful';

    /**
     * @param Hdd $hddModel
     * @param Service $service
    */
    public function __construct(Hdd $hddModel, Service $service)
    {
        $this->hddModel = $hddModel;
        $this->service = $service;
    }

    /**
     * @return array
    */
    public function getColumnsFromTable() {
        if(Auth::user()->can('create', Hdd::class)){
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
        if(Auth::user()->can('create', Hdd::class)){
            unset($arrayToStore['_token']);
            foreach($arrayToStore as $column => $value) {
                $this->hddModel[$column] = $value;
            }
            if ($this->hddModel->save()) {
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
        if(Auth::user()->can('update', Hdd::class)){
            $hdd = $this->getDataFromDb($id);
            unset($request['_method']);
            unset($request['_token']);
            foreach($request as $item => $value) {
                $hdd->$item = $value;
            }
            if($hdd->save()) {
                return [$this->success => $this->successful];
            }
            return [$this->danger => 'Save failed']; 
        }
        return [$this->danger => $this->PermissionDenied];
    }

    /**
     * @param String $hddId ID Hdd in DB
     * @return Array
     */
    public function deleteDataFromDb(int $hddId)
    {
        
        if(!(Auth::user()->can('delete', Hdd::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $hdd = $this->getDataFromDb($hddId);
        if (!($hdd->delete())){
            return [$this->danger => 'Delete failed'];
        }
        return [$this->success => $this->successful];
    }

    /**
     * @param int $hddId
    */
    public function getDataFromDb(int $hddId = 0)
    {
        if(Auth::user()->can('update', Hdd::class)){
            if ($hddId) {
                $hdd = Hdd::where('id', $hddId)
                    ->select($this->columnsForGetFromDb)
                    ->firstOrFail();
            } else {
                $hdd = Hdd::select($this->columnsForGetFromDb)->paginate(15);
            }
            return $hdd;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAll() {
        if(Auth::user()->can('viewany', Hdd::class)){
            $hdd = $this->getDataFromDb();
            return $hdd;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAllForAssemble() {
        $hdd = Hdd::select($this->columnsForGetFromDb)->get();
        return $hdd;
    }

}