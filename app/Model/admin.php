<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class admin extends Authenticatable {

    use Notifiable;

    protected $guard = 'web_admin';
    protected $table = 'admin';
    protected $fillable = ['name', 'type', 'mobile', 'email', 'password', 'image', 'status', 'created_at', 'updated_at',];
    protected $hidden = ['password', 'remember_token'];

}
