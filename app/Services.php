<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'service_category_id',
        'service_name'
    ];

    public function variations() {
        return $this->hasMany('App\ServicesVariation', 'service_id', 'id', 'services_variations');
    }

    public function servicesCategory() {
        return $this->belongsTo('App\ServicesCategory','service_category_id');
    }  

    public function consultation() {
        return $this->hasMany('App\ConsultationTransaction','service_category_id');
    }

    public function appointment() {
        return $this->hasMany('App\Appointments','id');
    }

    public function boarding() {
        return $this->hasMany('App\BoardingTransaction');
    }

    public function otherTransaction() {
        return $this->hasMany('App\OtherTransation');
    }


}
