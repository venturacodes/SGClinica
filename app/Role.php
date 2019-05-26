<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','slug'];
    
    public function users(){
        return $this->hasMany(\App\User::class);
    }

    public static function getRoleIdForDoctor(){
        return self::first()->id;
    }
}
