<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     */

    protected $model = Item::class;
    protected $fillable = [
        'id',
        'name',
        'description',
        'picture',
        'price',
        'box_id',
    ];

    function itemBox()
    {
        return $this->belongsTo(Box::class, 'box_id')->withDefault();
    }

    public function itemLoan()
    {
        return $this->hasOne(Loan::class, 'item_id');
    }

}
