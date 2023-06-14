<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnavailableDate extends Model
{
	protected $fillable = [
		'status',
		'reason',
		'date',
		'time',
		'is_whole_day'
	];
// 
	// public function appointment() {
	// 	return $this->hasMany('App\Appointment', 'status');
	// }
}
