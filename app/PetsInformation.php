<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetsInformation extends Model
{
    protected $fillable = [
        'pet_owner',
        'pet_image',
        'pet_name',
        'breed',
        'colors',
        'birthdate',
        'species',
        'gender',
        'types',
    ];

    protected function user() {
        return $this->belongsTo('App\User');
    }
}
