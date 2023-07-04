<?php

namespace App\Http\Livewire;
use App\Models\Ad;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAd extends Component
{
    public $title;
    public $body;
    public $price;

    protected $rules = [
        'title'=>'rquired|min:4',
        'body'=>'required|min:8',
        'price'=>'required|numeric'
    ];

    protected $messages = [
        'required'=>'Field :attribute is required, please fill it',
        'min'=>'Field :attribute should be longer than :min',
        'numeric'=>'Field :attribute must be a number'
    ];

    public function store () {
        $category = Category::find($this->category);
        $ad = $category->ads()->create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price
        ]);
        Auth::user()->ads()->save($ad);
        session()->flash('message', 'Anuncio Creado con éxito');
        $this->cleanForm();
    }

    public function update($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function cleanForm() {
        $this->title = "";
        $this->body = "";
        $this->price = "";

    }


    public function render()
    {
        return view('livewire.create-ad');
    }
}
