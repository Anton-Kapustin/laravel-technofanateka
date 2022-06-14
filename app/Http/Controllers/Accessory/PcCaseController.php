<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Models\PcCase;
use App\Http\Requests\PcCaseRequest;
use App\Http\Service\Accessory\PcCaseService;
use Redirect;

class PcCaseController extends Controller
{

    protected $pcCaseService;

    /**
     * @param PcCaseService $pcCaseService
     */
    public function __construct(PcCaseService $pcCaseService)
    {
        $this->pcCaseService = $pcCaseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayAccessory = $this->pcCaseService->getAll();
        if (isset($arrayAccessory['danger'])) {
            return Redirect::route('newsAdmin')->with($arrayAccessory);
        }
        $accessoryName = 'PcCase';
        return view('accessory/accessory', compact('arrayAccessory', 'accessoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithColumns = $this->pcCaseService->getColumnsFromTable();
        if (isset($arrayWithColumns['danger'])) {
            return Redirect::route('PcCase.index')->with($arrayWithColumns);;
        }
        $formAction = 'PcCase.store';
        return view('accessory/accessoryCreate', compact('arrayWithColumns', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PcCaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PcCaseRequest $request)
    {
        $response = $this->pcCaseService->storeInDb($request->all());
        return Redirect::route('PcCase.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PcCase  $pcCase
     * @return \Illuminate\Http\Response
     */
    public function show(PcCase $pcCase)
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
        $accessory = ($this->pcCaseService->getDataFromDb($id));
        if (isset($accessory['danger'])) {
            return Redirect::route('PcCase.index')->with($accessory);;
        }
        $accessory = $accessory->toArray();
        $formAction = 'PcCase.update';
        return view('accessory/accessoryEdit', compact('accessory', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\PcCaseRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PcCaseRequest $request, int $id)
    {
        $response = $this->pcCaseService->updateInDb($request->toArray(), $id);
        return Redirect::route('PcCase.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->pcCaseService->deleteDataFromDb($id);
        if (isset($response['danger'])) {
            return Redirect::route('PcCase.index')->with($response);;
        }
        return Redirect::route('PcCase.index')->with($response);
    }

}
