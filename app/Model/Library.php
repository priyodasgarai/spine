<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Library extends Model
{
     protected $table = 'libraries';
     
     public function user() {
        return $this->belongsToMany(User::class, 'user_librarie');
    }

}
