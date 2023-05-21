<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultationTransaction extends Model 
{
	protected $fillable = [
		'transaction_id',
		'service_category_id',
		'price',
		'additional_cost',
		'total',
		'pet_name',
		'weight',
		'temperature',
		'findings',
		'treatment'
	];

	protected $table = "consultation_transaction";

	// RELATIONSHIP
	protected function serviceOrderTransaction() {
		return $this->belongsTo('App\ServiceOrderTransaction');
	}

	public function serviceVariation() {
		return $this->belongsTo('App\ServicesVariation', 'service_category_id');
	}

	public function petsInformations() {
		return $this->belongsTo('App\PetsInformation', 'pet_name', 'id');
	}

	 // CUSTOM FUNCTION
	public function isVoided() {
		return (!empty($this->voided_at) || ($this->voided_at != null));
	}
}