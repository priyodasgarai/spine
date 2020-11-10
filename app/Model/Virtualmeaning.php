<?php

namespace App\Model;
use App\Model\User;
use App\Model\Uservirtualmeaning;

use Illuminate\Database\Eloquent\Model;

class Virtualmeaning extends Model
{
     protected $table = 'virtualmeanings';
     
     public function user() {
        return $this->belongsToMany(User::class, 'user_virtualmeaning')->using(Uservirtualmeaning::class);
    }
}
