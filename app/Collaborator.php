<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $fillable = ['user_id','clinic_id','name','phone', 'image'];

    public function clinics(){
        return $this->belongsToMany(\App\Clinic::class);
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function job(){
        return $this->belongsTo('App\Job');
    }

}
