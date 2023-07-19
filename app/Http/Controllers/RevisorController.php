<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Models\User;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('isRevisor')->except('becomeRevisor','makeRevisor');
    }

    public function becomeRevisor(){
        if (Auth::user()->is_revisor) {
            return redirect()->route('home')->withMessage(['type'=>'danger', 'text'=> __('Ya eres revisor!')]);
        } else {
            Mail::to('metapop@hotmail.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('home')->withMessage(['type'=>'success', 'text'=> __('Solicitud enviada con éxito, pronto sabrás algo, gracias!')]);
        }
    }

    public function makeRevisor(User $user){
        Artisan::call('metapop:makeUserRevisor', ['email'=>$user->email]);
        return redirect()->route('home')->withMessage(['type'=>'success', 'text'=> __('Ya tenemos un compañero más')]);
    }

    public function refuseRevisor () {
        return redirect()->route('home')->withMessage(['type'=>'danger', 'text'=> __('Tu solicitud ha sido rechazada')]);
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
        return redirect()->back()->withMessage(['type'=>'success', 'text'=>__('Anuncio aceptado')]);
    }


    public function rejectAd (Ad $ad) {
        $ad->setAccepted(false);
        $ad->save();
        return redirect()->back()->withMessage(['type'=>'danger', 'text'=>__('Anuncio rechazado')]);
    }
}


