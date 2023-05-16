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
			'reason',
			'status'
	];

	public function service() {
		return $this->belongsTo('App\Services', 'service_id', 'id', 'services');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}

	public function getAppointedTime() {
		return Appointments::getAppointmentTimes()[$this->appointment_time - 1];
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