<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaccinationTransaction extends Model
{
    protected $fillable = [
        'transaction_id',
        'pet_name',
        'variation_id',
        'expired_at',
        'price',
        'total',
    ];

    protected $table = "vaccination_transaction";

    protected function serviceOrderTransaction() {
        return $this->belongsTo('App\serviceOrderTransaction');
    }

    public function petsInformations() {
        return $this->hasMany('App\PetsInformation', 'pet_owner', 'id');
    }

       public function variations() {
        return $this->hasMany('App\ServicesVariation', 'variation_name','price');
    }

     // CUSTOM FUNCTION
    public function isVoided() {
        return (!empty($this->voided_at) || ($this->voided_at != null));
    }
}
