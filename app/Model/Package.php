<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Program;

class Package extends Model
{
    protected $table = 'packages';
    
    public function programs()
    {
        return $this->belongsToMany(Program::class,'package_program');
    }
}
