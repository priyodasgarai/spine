<?php

namespace App\Model;
use App\Model\User;
use App\Model\Virtualmeaning;

use Illuminate\Database\Eloquent\Model;

class Uservirtualmeaning extends Model
{
    protected $table = 'user_virtualmeaning';
     
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    
    public function Virtualmeaning()
    {
        return $this->belongsTo(Virtualmeaning::class, 'virtualmeaning_id','id');
    }
}
