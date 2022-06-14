<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\AccessoryService;
Use Redirect;

class AccessoryController extends Controller
{

    protected $accessoryService;

    /**
     * @param NewsService newsService Create NewsService
     */
    public function __construct(AccessoryService $accessoryService)
    {
        $this->accessoryServiceaccessoryService = $accessoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories = $this->accessoryService->getAllAccessories();
        if (isset($accessories['danger'])) {
            return Redirect::route('accessories')->with($accessories);
        }
        return view('accessories', compact('accessories'));
    }
}
