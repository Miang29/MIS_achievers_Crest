<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
	protected $fillable = [
		'name'
	];

	// Relationships
	protected function users() { return $this->hasMany('App\User'); }
	protected function permissions() { return $this->belongsToMany('App\Permission', 'type_permissions'); }
}