<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'service_category_id',
        'service_name'
    ];

    public function variations() {
        return $this->hasMany('App\ServicesVariation', 'service_id');
    }
    protected function servicesCategory() {
        return $this->belongsTo('App\ServicesCategory');
    }  
}
