<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Models\Ssd;
use App\Http\Requests\SsdRequest;
use App\Http\Service\Accessory\SsdService;
use Redirect;

class SsdController extends Controller
{

    protected $ssdService;

    /**
     * @param SsdService $ssdService
     */
    public function __construct(SsdService $ssdService)
    {
        $this->ssdService = $ssdService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayAccessory = $this->ssdService->getAll();
        if (isset($arrayAccessory['danger'])) {
            return Redirect::route('newsAdmin')->with($arrayAccessory);
        }
        $accessoryName = 'Ssd';
        return view('accessory/accessory', compact('arrayAccessory', 'accessoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithColumns = $this->ssdService->getColumnsFromTable();
        if (isset($arrayWithColumns['danger'])) {
            return Redirect::route('Ssd.index')->with($arrayWithColumns);;
        }
        $formAction = 'Ssd.store';
        return view('accessory/accessoryCreate', compact('arrayWithColumns', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\SsdRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SsdRequest $request)
    {
        $response = $this->ssdService->storeInDb($request->all());
        return Redirect::route('Ssd.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ssd  $ssd
     * @return \Illuminate\Http\Response
     */
    public function show(Ssd $ssd)
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
        $accessory = ($this->ssdService->getDataFromDb($id));
        if (isset($accessory['danger'])) {
            return Redirect::route('Ssd.index')->with($accessory);;
        }
        $accessory = $accessory->toArray();
        $formAction = 'Ssd.update';
        return view('accessory/accessoryEdit', compact('accessory', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\SsdRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SsdRequest $request, int $id)
    {
        $response = $this->ssdService->updateInDb($request->toArray(), $id);
        return Redirect::route('Ssd.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->ssdService->deleteDataFromDb($id);
        if (isset($response['danger'])) {
            return Redirect::route('Ssd.index')->with($response);;
        }
        return Redirect::route('Ssd.index')->with($response);
    }

}
