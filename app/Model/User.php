<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Model\Package;
use App\Model\user_address;
use App\Model\user_document;
use App\Model\librarie;
class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function packages() {
        return $this->belongsToMany(Package::class, 'user_package');
    }
    
    public function user_document(){
        return $this->hasMany(user_document::class,'user_id','id');
    }
    
     public function user_address(){
        return $this->hasMany(user_address::class,'user_id','id');
    }
    public function library() {
        return $this->belongsToMany(librarie::class, 'user_librarie');
    }
}