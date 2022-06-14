<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Models\Cpu;
use Illuminate\Http\Request;
use App\Http\Service\Accessory\CpuService;
use App\Http\Requests\CpuRequest;
use Redirect;
use Auth;

class CpuController extends Controller
{

    protected $cpuService;

    /**
     * @param CpuService
     */
    public function __construct(CpuService $cpuService)
    {
        $this->cpuService = $cpuService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayAccessory = $this->cpuService->getAll();
        if (isset($arrayAccessory['danger'])) {
            return Redirect::route('newsAdmin')->with($arrayAccessory);
        }
        $accessoryName = 'Cpu';
        return view('accessory/accessory', compact('arrayAccessory', 'accessoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithColumns = $this->cpuService->getColumnsFromTable();
        if (isset($arrayWithColumns['danger'])) {
            return Redirect::route('Cpu.index')->with($arrayWithColumns);;
        }
        $formAction = 'Cpu.store';
        return view('accessory/accessoryCreate', compact('arrayWithColumns', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CpuRequest  $cpuRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CpuRequest $cpuRequest)
    {
        
        $response = $this->cpuService->storeInDb($cpuRequest->all());
        return Redirect::route('Cpu.index')->with($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cpu  $cpu
     * @return \Illuminate\Http\Response
     */
    public function show(Cpu $cpu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $accessory = ($this->cpuService->getFromDb($id));
        if (isset($accessory['danger'])) {
            return Redirect::route('Cpu.index')->with($accessory);;
        }
        $accessory = $accessory->toArray();
        $formAction = 'Cpu.update';
        return view('accessory/accessoryEdit', compact('accessory', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\CpuRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CpuRequest $request, int $id)
    {
        $response = $this->cpuService->updateInDb($request->toArray(), $id);
        return Redirect::route('Cpu.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->cpuService->deleteFromDb($id);
        if (isset($response['danger'])) {
            return Redirect::route('Cpu.index')->with($response);;
        }
        return Redirect::route('Cpu.index')->with($response);
    }

    
}
