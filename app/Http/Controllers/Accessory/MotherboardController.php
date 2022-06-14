<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Models\Motherboard;
use App\Http\Requests\MotherboardRequest;
use App\Http\Service\Accessory\MotherboardService;
use Redirect;

class MotherboardController extends Controller
{

    protected $motherboardService;

    /**
     * @param motherboardService $motherboardService
     */
    public function __construct(MotherboardService $motherboardService)
    {
        $this->motherboardService = $motherboardService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayAccessory = $this->motherboardService->getAll();
        if (isset($arrayAccessory['danger'])) {
            return Redirect::route('newsAdmin')->with($arrayAccessory);
        }
        $accessoryName = 'Motherboard';
        return view('accessory/accessory', compact('arrayAccessory', 'accessoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithColumns = $this->motherboardService->getColumnsFromTable();
        if (isset($arrayWithColumns['danger'])) {
            return Redirect::route('Motherboard.index')->with($arrayWithColumns);;
        }
        $formAction = 'Motherboard.store';
        return view('accessory/accessoryCreate', compact('arrayWithColumns', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\MotherboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotherboardRequest $request)
    {
        $response = $this->motherboardService->storeInDb($request->all());
        return Redirect::route('Motherboard.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motherboard  $motherboard
     * @return \Illuminate\Http\Response
     */
    public function show(Motherboard $motherboard)
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
        $accessory = ($this->motherboardService->getDataFromDb($id));
        if (isset($accessory['danger'])) {
            return Redirect::route('Motherboard.index')->with($accessory);;
        }
        $accessory = $accessory->toArray();
        $formAction = 'Motherboard.update';
        return view('accessory/accessoryEdit', compact('accessory', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\MotherboardRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MotherboardRequest $request, int $id)
    {
        $response = $this->motherboardService->updateInDb($request->toArray(), $id);
        return Redirect::route('Motherboard.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->motherboardService->deleteDataFromDb($id);
        if (isset($response['danger'])) {
            return Redirect::route('Motherboard.index')->with($response);;
        }
        return Redirect::route('Motherboard.index')->with($response);
    }

}
