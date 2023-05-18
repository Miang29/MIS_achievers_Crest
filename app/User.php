<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'username',
        'email',
        'address',
        'gender',
        'password',
        'user_type_id',
        'login_attempts',
        'locked',
        'locked_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relational Functions
    protected function userType() {
        return $this->belongsTo('App\UserType');
    }

    public function petsInformations() {
        return $this->hasMany('App\PetsInformation', 'pet_owner', 'id');
    }

    public function appointment() {
        return $this->hasMany('App\Appointments', 'id');
    }

    public function clientNotification() {
        return $this->hasMany('App\ClientNotification', 'user_type_id','email');
    }
    
    // Custom Functions
    public function getName($include_middle = false) {
        return $this->first_name . ($include_middle ? (' ' . $this->middle_name . ' ') : ' ') . $this->last_name;
    }

    // Static Functions
	public static function getIP() {
		$ip = request()->ip();

		if (!empty($_SERVER['HTTP_CLIENT_IP']))
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else
			$ip = $_SERVER['REMOTE_ADDR'];

		return $ip;
	}
}