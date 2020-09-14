<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
//use App\Model\Package;

class Userpackage extends Model {

    protected $table = 'user_package';

    
//     public function Userpackage_timeslot(){
//        return $this->belongsTo(App\Model\Userpackage_timeslot::class, 'user_package_id');
//    }
    
     public function Userpackage_timeslot(){
        return $this->hasMany(App\Model\Userpackage_timeslot::class, 'user_package_id');
    }

}
