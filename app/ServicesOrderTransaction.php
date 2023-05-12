<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesOrderTransaction extends Model
{
	protected $fillable = [
		'reference_no',
		'mode_of_payment',
		'voided_at'
	];

	public function products() {
		return $this->hasMany('App\Products', 'id');
	}

	public function boarding() {
		return $this->hasMany('App\BoardingTransaction', 'transaction_id');
	}

	public function vaccination() {
		return $this->hasMany('App\VaccinationTransaction', 'transaction_id');
	}

	public function consultation() {
		return $this->hasMany('App\ConsultationTransaction', 'transaction_id');
	}

 	public function grooming() {
		return $this->hasMany('App\GroomingTransaction', 'transaction_id');
	}

	public function otherTransaction() {
		return $this->hasMany('App\OtherTransation', 'transaction_id');
	}


	// CUSTOM FUNCTION
	public function isVoided() {
		return (!empty($this->voided_at) || ($this->voided_at != null));
	}
}
