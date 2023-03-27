<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccinationTransaction extends Model
{
    protected $fillable = [
        'transaction_id',
        'pet_name',
        'service_name',
        'expired_at',
        'price',
        'total',
    ];
}
