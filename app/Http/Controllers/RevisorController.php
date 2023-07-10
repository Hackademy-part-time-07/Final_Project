<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevisorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('isRevisor');
    }


    public function index(){
        dd('Solo para revisores');
    }
}
