<?php

namespace App\Http\Livewire;
use App\Models\Ad;

use Livewire\Component;

class CreateAd extends Component
{
    public $title;
    public $body;
    public $price;

    

    public function store () {
        Ad::create([
            'title'=>$this->title,
            'body'=>$this->body,
            'price'=>$this->price
        ]);
        $this->cleanForm();
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
