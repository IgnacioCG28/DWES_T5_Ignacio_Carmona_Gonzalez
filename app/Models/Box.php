<?php

namespace App\Models;

use Database\Factories\BoxFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{

    protected $model = Box::class;

    protected $fillable = [
        'label',
        'location',
    ];

    use HasFactory;

 

    function BoxItems(){
        return $this->hasMany(Item::class)->select();
    }

    
}
