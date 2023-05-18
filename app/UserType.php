<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
	protected $fillable = [
		'name'
	];

	// Relationships
	protected function users() { return $this->hasMany('App\User'); }
	protected function permissions() { return $this->belongsToMany('App\Permission', 'type_permissions'); }

	public function clientNotification() {
        return $this->hasMany('App\ClientNotification','id');
    }
}