<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherTransation extends Model
{
    protected $fillable = [
    'transaction_id',
    'pet_name',
    'variation_id',
    'price',
    'total',

    ];
    protected $table = "other_transations";

    protected function serviceOrderTransaction() {
        return $this->belongsTo('App\serviceOrderTransaction');
    }

    public function petsInformations() {
        return $this->belongsTo('App\PetsInformation', 'pet_name');
    }

    public function services() {
        return $this->belongsTo('App\Services');
    }

    protected function servicesCategory() {
        return $this->belongsTo('App\ServicesCategory');
    }  

    public function variations() {
        return $this->belongsTo('App\ServicesVariation', 'variation_id');
    }


    // CUSTOM FUNCTION
    public function isVoided() {
        return (!empty($this->voided_at) || ($this->voided_at != null));
    }

}
