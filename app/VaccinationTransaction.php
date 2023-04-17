<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccinationTransaction extends Model
{
    protected $fillable = [
        'transaction_id',
        'pet_name',
        'variation_name',
        'expired_at',
        'price',
        'total',
    ];

    public function petsInformations() {
        return $this->hasMany('App\PetsInformation', 'pet_owner', 'id');
    }

       public function variations() {
        return $this->hasMany('App\ServicesVariation', 'variation_name','price');
    }
}
