<?php

namespace App\Http\Service;

use App\Models\Assemble;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AssembleRequest;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Service\Accessory\CpuService;
use App\Http\Service\Accessory\MotherboardService;
use App\Http\Service\Accessory\RamService;
use App\Http\Service\Accessory\SsdService;
use App\Http\Service\Accessory\HddService;
use App\Http\Service\Accessory\CoollerService;
use App\Http\Service\Accessory\PcCaseService;
use App\Http\Service\Accessory\PowerSupplyService;
use App\Http\Service\Accessory\VideoCardService;

class AssembleService {

    protected $assembleModel;
    protected $service;
    protected $success = 'success';
    protected $successful = 'Successful';
    protected $PermissionDenied = 'Permission denied';
    protected $empty = 'Empty';
    protected $danger = 'danger';
    protected $saveFailed = 'Save failed';
    protected $deleteFailed = 'Delete failed';
    protected $storeFilePath = 'assemblies_preview';
    protected $columnsForGetFromDb = ['id', 'type', 'preview_image', 'price', 'cpu_id', 
        'motherboard_id', 'video_card_id', 'ram_id', 'ssd_id', 'power_supply_id', 'cooller_id', 'pc_case_id', 'hdd_id'];

    /**
     * @param Assemble $assembleModel
     * @param Service $service
    */
    public function __construct(Assemble $assembleModel, Service $service, CpuService $cpuService,
CoollerService $coollerService, RamService $ramService, HddService $hddService, MotherboardService $motherboardService,
SsdService $ssdService, PcCaseService $pcCaseService, PowerSupplyService $powerSupplyService, VideoCardService $videoCardService)
    {
        $this->assembleModel = $assembleModel;
        $this->service = $service;
        $this->cpuService = $cpuService; 
        $this->coollerService = $coollerService; 
        $this->ramService = $ramService; 
        $this->hddService = $hddService; 
        $this->motherboardService = $motherboardService; 
        $this->ssdService = $ssdService; 
        $this->pcCaseService = $pcCaseService; 
        $this->powerSupplyService = $powerSupplyService; 
        $this->videoCardService = $videoCardService; 
    }

    public function getAssemblies() {
        if(\Route::currentRouteName() === 'Assemble.index') {
            $assembleGame = Assemble::where('type', 'Game')
                ->select($this->columnsForGetFromDb)
                ->get();
            $assembleOffice = Assemble::where('type', 'Office')
                ->select($this->columnsForGetFromDb)
                ->get();
            return ['game' => $assembleGame, 'office' => $assembleOffice];
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAssembliesForAdminPanel() {
        if(Auth::user()->can('viewAny', Assemble::class)) {
            $assembleGame = Assemble::where('type', 'Game')
                ->select($this->columnsForGetFromDb)
                ->get();
            $assembleOffice = Assemble::where('type', 'Office')
                ->select($this->columnsForGetFromDb)
                ->get();
            return ['game' => $assembleGame, 'office' => $assembleOffice];  
        }
        return [$this->danger => $this->PermissionDenied];
    }

    public function getAllAccessories() {
        if(Auth::user()->can('create', Assemble::class)){
            $arrayWithAccessories['cpu'] = ($this->cpuService->getAllForAssemble())->toArray();
            $arrayWithAccessories['motherboard'] = ($this->motherboardService->getAllForAssemble())->toArray();
            $arrayWithAccessories['ram'] = ($this->ramService->getAllForAssemble())->toArray();
            $arrayWithAccessories['hdd'] = ($this->hddService->getAllForAssemble())->toArray();
            $arrayWithAccessories['ssd'] = ($this->ssdService->getAllForAssemble())->toArray();
            $arrayWithAccessories['cooller'] = ($this->coollerService->getAllForAssemble())->toArray();
            $arrayWithAccessories['pc_case'] = ($this->pcCaseService->getAllForAssemble())->toArray();
            $arrayWithAccessories['power_supply'] = ($this->powerSupplyService->getAllForAssemble())->toArray();
            $arrayWithAccessories['video_card'] = ($this->videoCardService->getAllForAssemble())->toArray();
            $arrayWithAccessories['type'] = [['id' => 'game'], ['id' => 'office']];
            return $arrayWithAccessories;
        }

    }

    /**
     * 
     */
    public function getDataFromDb(int $id) {
        $assemble = Assemble::where('id', $id)
            ->select($this->columnsForGetFromDb)
            ->firstOrFail();
        return $assemble;

    }

    /**
     * @param int $id
     * @return Array
     */
    public function getAssembleForEdit(int $id) {
        if(Auth::user()->can('update', Assemble::class)) {
            $assembleArray = ($this->getDataFromDb($id));
            return $assembleArray;
        }
        return [$this->danger => $this->PermissionDenied];
    }

    /**
     * @param App\Http\Requests\AssembleRequest $request
     * @return Array
     * @return bool
     */
    public function storeDataInDb(array $request) {
        if(Auth::user()->can('create', Assemble::class)) {
            foreach($request as $key => $item) {
                if($key === 'preview_image') {
                    $path = $item->store('assemblies_preview', 'public');
                    $path = preg_replace('/\w+\//', '', $path);
                    $this->assembleModel[$key] = $path;
                    continue;
                }
                foreach($this->columnsForGetFromDb as $column) {
                    if(str_contains($column, $key)) {
                        $this->assembleModel[$column] = $item;
                    }
                }
                
            }
            if($this->assembleModel->save()) {
                return [$this->success => $this->successful];
            }
            return [$this->danger => $this->saveFailed]; 
            
        }
        return [$this->danger => $this->PermissionDenied];
    }

    /**
     * @param array $request
     * @param int $id
     * @return array
    */
    public function updateInDb(array $request, int $id) {
        if(Auth::user()->can('create', Assemble::class)) {
            $assemble = $this->getDataFromDb($id);
            foreach($request as $key => $item) {
                foreach($this->columnsForGetFromDb as $column) {
                    if(str_contains($column, $key)) {
                        if(($key === 'preview_image') and ($key != $assemble->$column)) {
                            $path = $item->store('assemblies_preview', 'public');
                            $path = preg_replace('/\w+\//', '', $path);
                            $this->assemble[$key] = $path;
                            continue;
                        }
                        $assemble->$column = $item;
                    }
                }
            }
            if($assemble->save()) {
                return [$this->success => $this->successful];
            }
            return [$this->danger => $this->saveFailed];

            }
 
            return [$this->danger => $this->PermissionDenied];
        }


    /**
     * 
     */
    public function deleteDataInDb(int $id) {
        if(!(Auth::user()->can('delete', Assemble::class))) {
            return [$this->danger, $this->PermissionDenied];
        }
        $assemble = $this->getDataFromDb($id);
        $filePath = $this->storeFilePath.'/'.$assemble->preview_image;
        if (!$assemble->delete()){
            return [$this->danger => $this->deleteFile];            
        }
        if($this->service->deleteFile('public', $filePath)) {
          return [$this->success => $this->successful];  
        }
        return [$this->danger => 'Delete image failed: '.$filePath];
            
    }

}