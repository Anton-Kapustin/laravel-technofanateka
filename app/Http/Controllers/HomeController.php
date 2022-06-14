<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\RequestLogin;

class HomeController extends Controller {

  public function index() {
    return view('home');
  }


}
