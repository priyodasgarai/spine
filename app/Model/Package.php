<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Program;
use App\Model\User;

class Package extends Model {

    protected $table = 'packages';

    public function programs() {
        return $this->belongsToMany(Program::class, 'package_program');
    }

    public function user() {
        return $this->belongsToMany(User::class, 'user_package');
    }

}
