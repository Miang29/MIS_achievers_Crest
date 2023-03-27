<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroomingTransaction extends Model
{
   protected $fillable = [
    'transaction_id',
    'pet_name',
    'service_name',
    'price',
    'total',
];
}
