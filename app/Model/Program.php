<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
     protected $table = 'programs';
     
     public function packages()
    {
        return $this->belongsToMany(App\Model\Package::class, 'packageprograms');
    }
}
