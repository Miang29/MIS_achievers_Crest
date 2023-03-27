<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultationTransaction extends Model
{
 protected $fillable = [
    'transaction_id',
    'service_name',
    'price',
    'additional_cost',
    'pet_name',
    'weight',
    'temperature',
    'findings',
    'treatment'
    'total'
    ];
}
