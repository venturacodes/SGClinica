<?php

namespace Dentist;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->hasMany(\Dentist\User::class);
    }
}
