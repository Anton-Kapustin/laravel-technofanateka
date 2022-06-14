<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Service\UserService;
use Illuminate\Support\Facades\Config;
Use Redirect;
use Auth;

class UserController extends Controller
{

    protected $userService;


    /**
     * @param NewsService newsService Create NewsService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getAllUsersFromDb();
        if (isset($users['danger'])) {
            return Redirect::route('User.show', Auth::user()->id)->with($users);
        }
        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id = 0)
    {
        $userModel = ($this->userService->getUserFromDb($id))->toArray();
        if (isset($userModel['danger'])) {
            return Redirect::route('newsAdmin')->with($userModel);
        }
        return view('userProfile', compact('userModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $userModel = ($this->userService->getUserProfileItemsForEdit($id));
        if (isset($userModel['danger'])) {
            return Redirect::route('userProfile')->with($userModel);
        }
        $structure = Config::get('structureUserFormItems');
        $selectItems = Config::get('userSelectItems');
        return view('userEdit', compact('userModel', 'structure' , 'selectItems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $userRequest)
    {
        // dd($userRequest);
        $response = $this->userService->updateUserInDb($userRequest);
        return Redirect::route('User.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
