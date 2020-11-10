<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Uservirtualmeaning;
class Userassignment extends Model
{
    //userassignment
      protected $table = 'userassignment';
      
  
    public function uservirtual()
    {
        return $this->belongsTo(Uservirtualmeaning::class);
    }
    
}
