<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function create(){
        return view('ad.create');
    }

    public function show(Ad $ad){ 
        return view("ad.show",compact('ad'));
    }
}
//linea 17 dentro del show falta sería (Ad $ad), quitando Ad no da error//
