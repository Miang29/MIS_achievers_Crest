<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
	public $timestamps = false;

    protected $fillable = [
        'pet_owner',
        'pet_name',
        'email',
        'date',
        'time',
        'service_type',
    ];
}
