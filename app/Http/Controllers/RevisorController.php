<?php

namespace App\Http\Controllers;
use App\Models\Ad;

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
        $ad = Ad::where('is_accepted', null)
                        ->orderBy('created_at', 'desc')
                        ->first();
        return view('revisor.home', compact('ad'));
    }

    public function acceptAd (Ad $ad) {
        $ad->setAccepted(true);
        $ad->save();
        return redirect()->back()->withMessage(['type'=>'success', 'text'=>'Anuncio aceptado']);
    }

    public function rejectAd (Ad $ad) {
        $ad->setAccepted(false);
        $ad->save();
        return redirect()->back()->withMessage(['type'=>'danger', 'text'=>'Anuncio rechazado']);
    }
}


