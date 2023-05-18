<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesVariation extends Model
{
    protected $fillable = [
        'service_id',
        'variation_name',
        'price',
        'remarks'
    ];

    public function services() {
        return $this->belongsTo('App\Services', 'service_id');
    } 

    public function vaccination() {
        return $this->hasMany('App\Vaccination', 'id');
    } 

    public function servicesCategory() {
        return $this->belongsTo('App\ServicesCategory','service_category_name');
    } 

    public function grooming() {
        return $this->hasMany('App\GroomingTransaction', 'variation_name');
    }

    public function boarding() {
        return $this->hasMany('App\BoardingTransaction', 'variation_name');
    }

     public function otherTransaction() {
        return $this->hasMany('App\OtherTransation', 'variation_name');
    }
   
}
