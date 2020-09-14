<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Userpackage_timeslot extends Model
{
     protected $table = 'userpackage_timeslots';
     
//      public function Userpackage(){
//        return $this->hasMany(App\Model\Userpackage::class, '');
//    }
      public function Userpackage()
    {
        return $this->belongsTo(App\Model\Userpackage::class, 'user_package_id','id');
    }
}
