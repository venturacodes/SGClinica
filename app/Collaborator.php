<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
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
