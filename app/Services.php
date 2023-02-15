<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'service_category_id',
        'service_name'
    ];

    protected function servicesCategory() {
        return $this->belongsTo('App\ServicesCategory');
    }

    protected function variations() {
        return $this->belongsTo('App\ServicesVariation');
    }
    
}
