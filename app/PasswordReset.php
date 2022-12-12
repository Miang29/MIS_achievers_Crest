<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PasswordReset extends Model
{
    protected $primary_key = 'email';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    
    protected $fillable = [
        'email',
        'token',  
        'expired_at',
    ];

  

    // Relationships
    public function user() { return $this->belongsTo('App\User', 'email', 'email'); }
}
