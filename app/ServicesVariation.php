<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesVariation extends Model
{
    protected $fillable = [
        'service_category_name',
        'service_name',
        'variation_name',
        'price',
        'remarks'
    ];

    public function services() {
        return $this->hasMany('App\Services', 'service_category_id', 'service_id');
    }
}
