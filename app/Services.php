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
        return $this->belongsTo('App\ServicesCategory','service_category_id');
    }  

    public function consultation() {
        return $this->hasMany('App\ConsultationTransaction','service_category_id');
    }

    public function otherTransaction() {
        return $this->hasMany('App\OtherTransation', 'service_name');
    }

    protected function appointment() {
        return $this->hasMany('App\Appointments','id');
    }


}
