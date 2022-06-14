<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Models\Ram;
use App\Http\Requests\RamRequest;
use App\Http\Service\Accessory\RamService;
use Redirect;

class RamController extends Controller
{

    protected $ramService;

    /**
     * @param RamService $ramService
     */
    public function __construct(RamService $ramService)
    {
        $this->ramService = $ramService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayAccessory = $this->ramService->getAll();
        if (isset($arrayAccessory['danger'])) {
            return Redirect::route('newsAdmin')->with($arrayAccessory);
        }
        $accessoryName = 'Ram';
        return view('accessory/accessory', compact('arrayAccessory', 'accessoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithColumns = $this->ramService->getColumnsFromTable();
        if (isset($arrayWithColumns['danger'])) {
            return Redirect::route('Ram.index')->with($arrayWithColumns);;
        }
        $formAction = 'Ram.store';
        return view('accessory/accessoryCreate', compact('arrayWithColumns', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RamRequest $request)
    {
        $response = $this->ramService->storeInDb($request->all());
        return Redirect::route('Ram.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ram  $ram
     * @return \Illuminate\Http\Response
     */
    public function show(Ram $ram)
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
        $accessory = ($this->ramService->getDataFromDb($id));
        if (isset($accessory['danger'])) {
            return Redirect::route('Ram.index')->with($accessory);;
        }
        $accessory = $accessory->toArray();
        $formAction = 'Ram.update';
        return view('accessory/accessoryEdit', compact('accessory', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\RamRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RamRequest $request, int $id)
    {
        $response = $this->ramService->updateInDb($request->toArray(), $id);
        return Redirect::route('Ram.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->ramService->deleteDataFromDb($id);
        if (isset($response['danger'])) {
            return Redirect::route('Ram.index')->with($response);;
        }
        return Redirect::route('Ram.index')->with($response);
    }

}
