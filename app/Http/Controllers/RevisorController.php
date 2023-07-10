<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('isRevisor');
    }

    public function becomeRevisor(){
        Mail::to('admin@metapop.es')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->withMessage(['type'=>'success', 'text'=> 'Solicitud enviada con éxito, pronto sabrás algo, gracias!']);
    }

    public function makeRevUserisor( $user){
        Artisan::call('metapop:makeUserRevisor', ['email'=>$user->email]);
        return redirect()->route('home')->withMessage(['type'=>'success', 'text'=> 'Ya tenemos un compañero más']);
    }


    public function index(){
        dd('Solo para revisores');
    }
}
