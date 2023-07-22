<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function payment()
    {
        return view('paymnet');
    }
}
