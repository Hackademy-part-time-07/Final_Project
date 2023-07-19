<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    public function index(){
        $ad = Ad::where('is_accepted', null)
                        ->orderBy('created_at', 'desc')
                        ->first();
        return view('admin.home', compact('ad'));
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
