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
        return $this->belongsTo('App\Vaccination', 'variation_name');
    } 
   
}
