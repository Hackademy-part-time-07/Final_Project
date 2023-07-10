<?php

namespace App\Http\Controllers;
use App\Models\Ad;

use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index () {
        $ads = Ad::where('is_accepted', true)->orderby('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('ads'));
    }
    
    public function adsByCategory(Category $category){
        $ads = $category->ads()->where('is_accepted', true)->latest()->paginate(6);
        return view('ad.by-category',compact('category','ads'));

    }
}