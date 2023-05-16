<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
    
            'appointment_no',
            'service_id',
            'appointment_time',
            'reserved_at',
            'user_id',
            'pet_information_id',
            'breed',
            'reason'
    ];

    public function services() {
        return $this->belongsTo('App\Services', 'service_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }



    
}
