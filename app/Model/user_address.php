<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class user_address extends Model
{
     protected $table = 'user_address';
     
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
