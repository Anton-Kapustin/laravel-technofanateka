<?php

namespace App\Http\Service\Accessory;

use App\Http\Service\Service;
use App\Models\Cpu;
use Auth;

class CpuService {

    protected $cpuModel;
    protected $service;
    protected $success = 'success';
    protected $danger = 'danger';
    protected $columnsForGetFromDb = ['id', 'model', 'family', 'frequency', 'socket'];
    protected $PermissionDenied = 'Permission denied';
    protected $successful = 'Successful';

    /**
     * @param Cpu $cpuModel
     * @param Service $service
    */
    public function __construct(Cpu $cpuModel, Service $service)
    {
		$this->cpuModel = $cpuModel;
        $this->service = $service;
    }

    /**
     * @return array
    */
    public function getColumnsFromTable() {
        if(Auth::user()->can('create', Cpu::class)){
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
        if(Auth::user()->can('create', Cpu::class)){
            unset($arrayToStore['_token']);
            foreach($arrayToStore as $column => $value) {
                $this->cpuModel[$column] = $value;
            }
            if ($this->cpuModel->save()) {
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
        if(Auth::user()->can('update', Cpu::class)){
            $cpu = $this->getFromDb($id);
            unset($request['_method']);
            unset($request['_token']);
            foreach($request as $item => $value) {
                $cpu->$item = $value;
            }
            if($cpu->save()) {
                return [$this->success => $this->successful];
            }
            return [$this->danger => 'Save failed']; 
        }
        return [$this->danger => $this->PermissionDenied];
    }

    /**
     * @param String $cpuId ID cpu in DB
     * @return Array
     */
    public function deleteFromDb(int $cpuId)
    {
        
        if(!(Auth::user()->can('delete', Cpu::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $cpu = $this->getFromDb($cpuId);
        if (!($cpu->delete())){
            return [$this->danger => 'Delete failed'];
        }
        return [$this->success => $this->successful];
    }

    /**
     * @param int $cpuId
    */
    public function getFromDb(int $cpuId = 0)
    {
        if(Auth::user()->can('update', Cpu::class)){
    		if ($cpuId) {
                $cpu = Cpu::where('id', $cpuId)
                    ->select($this->columnsForGetFromDb)
                    ->firstOrFail();
            } else {
                $cpu = Cpu::select($this->columnsForGetFromDb)->paginate(15);
            }
            return $cpu;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAll() {
        if(Auth::user()->can('viewany', Cpu::class)){
            $cpu = $this->getFromDb();
            return $cpu;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAllForAssemble() {
        $cpu = Cpu::select($this->columnsForGetFromDb)->get();
        return $cpu;
    }

}