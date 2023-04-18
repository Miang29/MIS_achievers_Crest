<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultationTransaction extends Model
{
 protected $fillable = [
    'transaction_id',
    'service_category_id',
    'price',
    'additional_cost',
    'total',
    'pet_name',
    'weight',
    'temperature',
    'findings',
    'treatment'
    ];

    protected $table = "consultation_transaction";

    protected function serviceOrderTransaction() {
        return $this->belongsTo('App\serviceOrderTransaction');
    }


    public function services() {
        return $this->hasMany('App\Services', 'service_category_id');
    }
  
     public function servicesCategory() {
        return $this->belongsTo('App\ServicesCategory', 'service_category_id');
    }

     public function petsInformations() {
        return $this->hasMany('App\PetsInformation', 'pet_owner', 'id');
    }
    
}
