<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Models\PowerSupply;
use App\Http\Requests\PowerSupplyRequest;
use App\Http\Service\Accessory\PowerSupplyService;
use Redirect;

class PowerSupplyController extends Controller
{

    protected $powerSupplyService;

    /**
     * @param PowerSupplyService $powerSupplyService
     */
    public function __construct(PowerSupplyService $powerSupplyService)
    {
        $this->powerSupplyService = $powerSupplyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayAccessory = $this->powerSupplyService->getAll();
        if (isset($arrayAccessory['danger'])) {
            return Redirect::route('newsAdmin')->with($arrayAccessory);
        }
        $accessoryName = 'PowerSupply';
        return view('accessory/accessory', compact('arrayAccessory', 'accessoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithColumns = $this->powerSupplyService->getColumnsFromTable();
        if (isset($arrayWithColumns['danger'])) {
            return Redirect::route('PowerSupply.index')->with($arrayWithColumns);;
        }
        $formAction = 'PowerSupply.store';
        return view('accessory/accessoryCreate', compact('arrayWithColumns', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PowerSupplyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PowerSupplyRequest $request)
    {
        $response = $this->powerSupplyService->storeInDb($request->all());
        return Redirect::route('PowerSupply.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PowerSupply  $powerSupply
     * @return \Illuminate\Http\Response
     */
    public function show(PowerSupply $powerSupply)
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
        $accessory = ($this->powerSupplyService->getDataFromDb($id));
        if (isset($accessory['danger'])) {
            return Redirect::route('PowerSupply.index')->with($accessory);;
        }
        $accessory = $accessory->toArray();
        $formAction = 'PowerSupply.update';
        return view('accessory/accessoryEdit', compact('accessory', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\PowerSupplyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PowerSupplyRequest $request, int $id)
    {
        $response = $this->powerSupplyService->updateInDb($request->toArray(), $id);
        return Redirect::route('PowerSupply.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->powerSupplyService->deleteDataFromDb($id);
        if (isset($response['danger'])) {
            return Redirect::route('PowerSupply.index')->with($response);;
        }
        return Redirect::route('PowerSupply.index')->with($response);
    }

}
