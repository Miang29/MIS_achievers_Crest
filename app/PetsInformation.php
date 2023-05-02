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

    public function user() {
        return $this->belongsTo('App\User', 'pet_owner');
    }

   
    public function vaccination() {
        return $this->belongsTo('App\Vaccination', 'pet_name');
    }

      public function consultation() {
        return $this->belongsTo('App\ConsultationTransaction','service_category_id');
    }

    public function getImage($getFull = true) {
        return $getFull ? asset("uploads/clients/{$this->pet_owner}/pets/{$this->pet_image}") : $this->pet_image;
    }
}
