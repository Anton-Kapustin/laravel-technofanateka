<?php

namespace App\Http\Service\Accessory;

use App\Http\Service\Service;
use App\Models\PowerSupply;
use Auth;

class PowerSupplyService {

    protected $powerSupplyModel;
    protected $service;
    protected $success = 'success';
    protected $danger = 'danger';
    protected $columnsForGetFromDb = ['id', 'model', 'power'];
    protected $PermissionDenied = 'Permission denied';
    protected $successful = 'Successful';

    /**
     * @param PowerSupply $powerSupplyModel
     * @param Service $service
    */
    public function __construct(PowerSupply $powerSupplyModel, Service $service)
    {
        $this->powerSupplyModel = $powerSupplyModel;
        $this->service = $service;
    }

    /**
     * @return array
    */
    public function getColumnsFromTable() {
        if(Auth::user()->can('create', PowerSupply::class)){
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
        if(Auth::user()->can('create', PowerSupply::class)){
            unset($arrayToStore['_token']);
            foreach($arrayToStore as $column => $value) {
                $this->powerSupplyModel[$column] = $value;
            }
            if ($this->powerSupplyModel->save()) {
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
        if(Auth::user()->can('update', PowerSupply::class)){
            $powerSupply = $this->getDataFromDb($id);
            unset($request['_method']);
            unset($request['_token']);
            foreach($request as $item => $value) {
                $powerSupply->$item = $value;
            }
            if($powerSupply->save()) {
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
        
        if(!(Auth::user()->can('delete', PowerSupply::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $powerSupply = $this->getDataFromDb($id);
        if (!($powerSupply->delete())){
            return [$this->danger => 'Delete failed'];
        }
        return [$this->success => $this->successful];
    }

    /**
     * @param int $id
    */
    public function getDataFromDb(int $id = 0)
    {
        if(Auth::user()->can('update', PowerSupply::class)){
            if ($id) {
                $powerSupply = PowerSupply::where('id', $id)
                    ->select($this->columnsForGetFromDb)
                    ->firstOrFail();
            } else {
                $powerSupply = PowerSupply::select($this->columnsForGetFromDb)->paginate(15);
            }
            return $powerSupply;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAll() {
        if(Auth::user()->can('viewany', PowerSupply::class)){
            $powerSupply = $this->getDataFromDb();
            return $powerSupply;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAllForAssemble() {
        $powerSupply = PowerSupply::select($this->columnsForGetFromDb)->get();
        return $powerSupply;
    }

}