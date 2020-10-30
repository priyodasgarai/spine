<?php

namespace App\Model;
use App\Model\User;

use Illuminate\Database\Eloquent\Model;

class user_document extends Model
{
    protected $table = 'user_document';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    
}
