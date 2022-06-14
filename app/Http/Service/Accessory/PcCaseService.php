<?php

namespace App\Http\Service\Accessory;

use App\Http\Service\Service;
use App\Models\PcCase;
use Auth;

class PcCaseService {

    protected $pcCaseModel;
    protected $service;
    protected $success = 'success';
    protected $danger = 'danger';
    protected $columnsForGetFromDb = ['id', 'model', 'type'];
    protected $PermissionDenied = 'Permission denied';
    protected $successful = 'Successful';

    /**
     * @param PcCase $pcCaseModel
     * @param Service $service
    */
    public function __construct(PcCase $pcCaseModel, Service $service)
    {
        $this->pcCaseModel = $pcCaseModel;
        $this->service = $service;
    }

    /**
     * @return array
    */
    public function getColumnsFromTable() {
        if(Auth::user()->can('create', PcCase::class)){
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
        if(Auth::user()->can('create', PcCase::class)){
            unset($arrayToStore['_token']);
            foreach($arrayToStore as $column => $value) {
                $this->pcCaseModel[$column] = $value;
            }
            if ($this->pcCaseModel->save()) {
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
        if(Auth::user()->can('update', PcCase::class)){
            $pcCase = $this->getDataFromDb($id);
            unset($request['_method']);
            unset($request['_token']);
            foreach($request as $item => $value) {
                $pcCase->$item = $value;
            }
            if($pcCase->save()) {
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
        
        if(!(Auth::user()->can('delete', PcCase::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $pcCase = $this->getDataFromDb($id);
        if (!($pcCase->delete())){
            return [$this->danger => 'Delete failed'];
        }
        return [$this->success => $this->successful];
    }

    /**
     * @param int $id
    */
    public function getDataFromDb(int $id = 0)
    {
        if(Auth::user()->can('update', PcCase::class)){
            if ($id) {
                $pcCase = PcCase::where('id', $id)
                    ->select($this->columnsForGetFromDb)
                    ->firstOrFail();
            } else {
                $pcCase = PcCase::select($this->columnsForGetFromDb)->paginate(15);
            }
            return $pcCase;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAll() {
        if(Auth::user()->can('viewany', PcCase::class)){
            $pcCase = $this->getDataFromDb();
            return $pcCase;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAllForAssemble() {
        $pcCase = PcCase::select($this->columnsForGetFromDb)->get();
        return $pcCase;
    }

}