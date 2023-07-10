<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ad extends Model
{
    protected $fillable = ['title', 'body', 'price'];
    use HasFactory;

    


    public function user(){
        return $this->BelongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value) {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    static public function ToBeRevisionedCount() {
        return Ad::where('is_accepted', null)->count();
    }
}
