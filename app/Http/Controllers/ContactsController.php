<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\RequestLogin;

class ContactsController extends Controller {

  public function show_contacts_page()
  {
    return view('contacts');
  }

}
