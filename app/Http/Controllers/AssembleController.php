<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\AssembleService;
use App\Http\Requests\AssembleRequest;
Use Redirect;

class AssembleController extends Controller
{

    protected $assembleService;

    /**
     * @param NewsService newsService Create NewsService
     */
    public function __construct(AssembleService $assembleService)
    {
        $this->assembleService = $assembleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assemble = $this->assembleService->getAssemblies();
        $assembleGame = $assemble['game'];
        $assembleOffice = $assemble['office'];
        return view('assemble/assemble', compact('assembleGame', 'assembleOffice'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        $assemble = $this->assembleService->getAssembliesForAdminPanel();
        if(isset($assemble['danger'])) {
            return \Redirect::route('newsAdmin')->with($assemble);
        }
        $assembleGame = $assemble['game'];
        $assembleOffice = $assemble['office'];
        return view('assemble/assemble', compact('assembleGame', 'assembleOffice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithAccessories = $this->assembleService->getAllAccessories();
        if(isset($arrayWithAccessories['danger'])) {
            return \Redirect::route('Assemble.index')->with($assemble);
        }
        $formAction = 'Assemble.store';
        return view('assemble/assembleCreate', compact('arrayWithAccessories', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssembleRequest $request)
    {
        $response = $this->assembleService->storeDataInDb($request->except(['_token']));
        return \Redirect::route('assembleAdmin')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assemble = $this->assembleService->getAssembleForEdit($id);
        $arrayWithAccessories = $this->assembleService->getAllAccessories();
        $formAction = 'Assemble.update';
        if((isset($arrayWithAccessories['danger'])) or (isset($assemble['danger']))) {
            return Redirect::route('Assemble.index')->with($assemble);
        }
        return view('assemble/assembleEdit', compact('arrayWithAccessories', 'assemble', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssembleRequest $request, $id)
    {
        $response = $this->assembleService->updateInDb($request->toArray(), $id);
        return Redirect::route('Assemble.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->assembleService->deleteDataInDb($id);
        return \Redirect::route('assembleAdmin')->with($response);
    }
}
