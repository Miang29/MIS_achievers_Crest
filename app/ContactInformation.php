<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
	protected $fillable = [
		'client_name',
		'email',
		'mobile_no',
		'message',
		'status',
		'reply'
	];

	protected $table = "contact_informations";
}
