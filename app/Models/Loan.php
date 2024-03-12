<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;


    protected $model = Loan::class;
   protected $fillable = [
    'user_id',
    'item_id',
    'checkout_date',
    'due_date',
    'returned_date',
];


public function loanUser()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function loanItem()
{
    return $this->belongsTo(Item::class, 'item_id');
}
}
