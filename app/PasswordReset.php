<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PasswordReset extends Model
{
    protected $fillable = [
        'email',
        'token',  
        'expired_at',
    ];

    public $primary_key = 'email';
    public $timestamps = false;

    // Relationships
    public function user() { return $this->belongsTo('App\User', 'email', 'email'); }
}
