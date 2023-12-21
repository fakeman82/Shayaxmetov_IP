<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\pizza;
use App\Models\recipes;

class united_pizza extends Model
{
    protected $fillable =["title", "ingridients", "image", "category"];

    public function recipes(){
        return $this->belongsTo(recipes::class);
    }
}
