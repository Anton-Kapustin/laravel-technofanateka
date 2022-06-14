<?php

namespace App\Http\Service\Accessory;

use App\Http\Service\Service;
use App\Models\Motherboard;
use Auth;

class MotherboardService {

    protected $motherboardModel;
    protected $service;
    protected $success = 'success';
    protected $danger = 'danger';
    protected $columnsForGetFromDb = ['id', 'model', 'type_ram', 'ram_frequency', 'support'];
    protected $PermissionDenied = 'Permission denied';
    protected $successful = 'Successful';

    /**
     * @param Motherboard $motherboardModel
     * @param Service $service
    */
    public function __construct(Motherboard $motherboardModel, Service $service)
    {
        $this->MotherboardModel = $motherboardModel;
        $this->service = $service;
    }

    /**
     * @return array
    */
    public function getColumnsFromTable() {
        if(Auth::user()->can('create', Motherboard::class)){
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
        if(Auth::user()->can('create', Motherboard::class)){
            unset($arrayToStore['_token']);
            foreach($arrayToStore as $column => $value) {
                $this->MotherboardModel[$column] = $value;
            }
            if ($this->MotherboardModel->save()) {
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
        if(Auth::user()->can('update', Motherboard::class)){
            $motherboard = $this->getDataFromDb($id);
            unset($request['_method']);
            unset($request['_token']);
            foreach($request as $item => $value) {
                $motherboard->$item = $value;
            }
            if($motherboard->save()) {
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
        
        if(!(Auth::user()->can('delete', Motherboard::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $motherboard = $this->getDataFromDb($id);
        if (!($motherboard->delete())){
            return [$this->danger => 'Delete failed'];
        }
        return [$this->success => $this->successful];
    }

    /**
     * @param int $id
    */
    public function getDataFromDb(int $id = 0)
    {
        if(Auth::user()->can('update', Motherboard::class)){
            if ($id) {
                $motherboard = Motherboard::where('id', $id)
                    ->select($this->columnsForGetFromDb)
                    ->firstOrFail();
            } else {
                $motherboard = Motherboard::select($this->columnsForGetFromDb)->paginate(15);
            }
            return $motherboard;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAll() {
        if(Auth::user()->can('viewany', Motherboard::class)){
            $motherboard = $this->getDataFromDb();
            return $motherboard;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAllForAssemble() {
        $motherboard = Motherboard::select($this->columnsForGetFromDb)->get();
        return $motherboard;
    }

}