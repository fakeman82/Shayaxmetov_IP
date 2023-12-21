<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\pizza;
use App\Models\united_pizza;

class recipes extends Model
{
    protected $fillable = ["title", "ingridients", "price", "image", "role", "category"];

    public function united_pizza(){
        return $this->hasMany(united_pizza::class);
    }
}
