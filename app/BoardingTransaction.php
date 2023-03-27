<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardingTransaction extends Model
{
 protected $fillable = [
    'transaction_id',
    'pet_name',
    'service_name',
    'price',
    'total',
    ];
}
