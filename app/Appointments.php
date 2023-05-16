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
            'pet_information_id',
            'reason',
            // 0 = Pending; 1 = Accepted; 2 = Rejected
            'status',
    ];

    public function services() {
        return $this->belongsTo('App\Services', 'service_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function petsInformations() {
        
        return $this->belongsTo('App\PetsInformation', 'pet_information_id');
    }   
    
    public function getAppointedTime() {
            return $this->getAppointmentTimes()[$this->appointment_time-1];
}

public static function getAppointmentTimes() {
        return array(
            "8:00 AM - 10:00 AM",
            "10:00 AM - 12:00 PM",
            "1:00 PM - 3:00 PM",
            "3:00 PM - 5:00 PM",
            "5:00 PM - 7:00 PM",
        );
    }
}
