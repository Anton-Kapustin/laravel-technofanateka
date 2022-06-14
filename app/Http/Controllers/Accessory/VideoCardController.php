<?php

namespace App\Http\Controllers\Accessory;

use App\Http\Controllers\Controller;
use App\Models\VideoCard;
use App\Http\Requests\VideoCardRequest;
use App\Http\Service\Accessory\VideoCardService;
use Redirect;

class VideoCardController extends Controller
{

    protected $videoCardService;

    /**
     * @param VideoCardService $videoCardService
     */
    public function __construct(VideoCardService $videoCardService)
    {
        $this->videoCardService = $videoCardService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayAccessory = $this->videoCardService->getAll();
        if (isset($arrayAccessory['danger'])) {
            return Redirect::route('newsAdmin')->with($arrayAccessory);
        }
        $accessoryName = 'VideoCard';
        return view('accessory/accessory', compact('arrayAccessory', 'accessoryName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arrayWithColumns = $this->videoCardService->getColumnsFromTable();
        if (isset($arrayWithColumns['danger'])) {
            return Redirect::route('VideoCard.index')->with($arrayWithColumns);;
        }
        $formAction = 'VideoCard.store';
        return view('accessory/accessoryCreate', compact('arrayWithColumns', 'formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\VideoCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoCardRequest $request)
    {
        $response = $this->videoCardService->storeInDb($request->all());
        return Redirect::route('VideoCard.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoCard  $videoCard
     * @return \Illuminate\Http\Response
     */
    public function show(VideoCard $videoCard)
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
        $accessory = ($this->videoCardService->getDataFromDb($id));
        if (isset($accessory['danger'])) {
            return Redirect::route('VideoCard.index')->with($accessory);;
        }
        $accessory = $accessory->toArray();
        $formAction = 'VideoCard.update';
        return view('accessory/accessoryEdit', compact('accessory', 'formAction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\VideoCardRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoCardRequest $request, int $id)
    {
        $response = $this->videoCardService->updateInDb($request->toArray(), $id);
        return Redirect::route('VideoCard.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $response = $this->videoCardService->deleteDataFromDb($id);
        if (isset($response['danger'])) {
            return Redirect::route('VideoCard.index')->with($response);;
        }
        return Redirect::route('VideoCard.index')->with($response);
    }

}
