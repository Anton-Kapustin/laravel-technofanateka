<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Models\Cooller;
use App\Http\Requests\CoollerRequest;
use App\Http\Service\Accessory\CoollerService;
use Redirect;

class CoollerController extends Controller
{

    protected $coollerService;

    /**
     * @param NewsService newsService Create NewsService
     */
    public function __construct(CoollerService $coollerService)
    {
        $this->coollerService = $coollerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayAccessory = $this->coollerService->getAll();
        if (isset($arrayAccessory['danger'])) {
            return Redirect::route('newsAdmin')->with($arrayAccessory);
        }
        $accessoryName = 'Cooller';
        return view('accessory/accessory', compact('arrayAccessory', 'accessoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithColumns = $this->coollerService->getColumnsFromTable();
        if (isset($arrayWithColumns['danger'])) {
            return Redirect::route('Cooller.index')->with($arrayWithColumns);;
        }
        $formAction = 'Cooller.store';
        return view('accessory/accessoryCreate', compact('arrayWithColumns', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CoollerRequest $request)
    {
        $response = $this->coollerService->storeInDb($request->all());
        return Redirect::route('Cooller.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooller  $cooller
     * @return \Illuminate\Http\Response
     */
    public function show(Cooller $cooller)
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
        $accessory = ($this->coollerService->getDataFromDb($id));
        if (isset($accessory['danger'])) {
            return Redirect::route('Cooller.index')->with($accessory);;
        }
        $accessory = $accessory->toArray();
        $formAction = 'Cooller.update';
        return view('accessory/accessoryEdit', compact('accessory', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\CoollerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CoollerRequest $request, int $id)
    {
        $response = $this->coollerService->updateInDb($request->toArray(), $id);
        return Redirect::route('Cooller.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->coollerService->deleteDataFromDb($id);
        if (isset($response['danger'])) {
            return Redirect::route('Cooller.index')->with($response);;
        }
        return Redirect::route('Cooller.index')->with($response);
    }

}
