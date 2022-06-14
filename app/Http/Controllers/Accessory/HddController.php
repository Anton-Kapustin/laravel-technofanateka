<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Models\Hdd;
use App\Http\Requests\HddRequest;
use App\Http\Service\Accessory\HddService;
use Redirect;

class HddController extends Controller
{

    protected $hddService;

    /**
     * @param HddService $hddService
     */
    public function __construct(HddService $hddService)
    {
        $this->hddService = $hddService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayAccessory = $this->hddService->getAll();
        if (isset($arrayAccessory['danger'])) {
            return Redirect::route('newsAdmin')->with($arrayAccessory);
        }
        $accessoryName = 'Hdd';
        return view('accessory/accessory', compact('arrayAccessory', 'accessoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithColumns = $this->hddService->getColumnsFromTable();
        if (isset($arrayWithColumns['danger'])) {
            return Redirect::route('Hdd.index')->with($arrayWithColumns);;
        }
        $formAction = 'Hdd.store';
        return view('accessory/accessoryCreate', compact('arrayWithColumns', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\HddRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HddRequest $request)
    {
        $response = $this->hddService->storeInDb($request->all());
        return Redirect::route('Hdd.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hdd  $Hdd
     * @return \Illuminate\Http\Response
     */
    public function show(Hdd $Hdd)
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
        $accessory = ($this->hddService->getDataFromDb($id));
        if (isset($accessory['danger'])) {
            return Redirect::route('Hdd.index')->with($accessory);;
        }
        $accessory = $accessory->toArray();
        $formAction = 'Hdd.update';
        return view('accessory/accessoryEdit', compact('accessory', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\HddRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HddRequest $request, int $id)
    {
        $response = $this->hddService->updateInDb($request->toArray(), $id);
        return Redirect::route('Hdd.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->hddService->deleteDataFromDb($id);
        if (isset($response['danger'])) {
            return Redirect::route('Hdd.index')->with($response);;
        }
        return Redirect::route('Hdd.index')->with($response);
    }

}
