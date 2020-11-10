<?php

namespace App\Model;
use App\Model\User;
use App\Model\Virtualmeaning;
use App\Model\Userassignment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Uservirtualmeaning extends Pivot
{
    protected $table = 'user_virtualmeaning';
     
//    public function user()
//    {
//        return $this->belongsTo(User::class, 'user_id','id');
//    }
//    
    public function Virtualmeaning()
    {
        return $this->belongsTo(Virtualmeaning::class, 'virtualmeaning_id','id');
    }
    
   
    
     public function assignVideo()
    {
        return $this->hasMany(Userassignment::class)->withPivot('id');
    }
}
