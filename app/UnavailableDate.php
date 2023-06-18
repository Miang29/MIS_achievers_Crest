<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableDate extends Model
{
	protected $fillable = [
		'date',
		'time',
		'is_whole_day',
		'status',
		'reason',
	];
// 
	// public function appointment() {
	// 	return $this->hasMany('App\Appointment', 'status');
	// }
}
