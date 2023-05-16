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
        return $this->hasMany('App\Vaccination', 'pet_name');
    }

    public function grooming() {
        return $this->hasMany('App\GroomingTransaction', 'pet_name');
    }

    public function boarding() {
        return $this->hasMany('App\BoardingTransaction', 'pet_name');
    }

    public function consultation() {
        return $this->hasMany('App\ConsultationTransaction', 'pet_name');
    }

    public function otherTransaction() {
        return $this->hasMany('App\OtherTransation', 'pet_name');
    }

    public function appointment() {
        return $this->hasMany('App\Appointments', 'id', 'pet_name');
    }


    public function getImage($getFull = true) {
        return $getFull ? asset("uploads/clients/{$this->pet_owner}/pets/{$this->pet_image}") : $this->pet_image;
    }
}
