<?php

namespace Dentist;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    public function clinics(){
        return $this->belongsToMany(\Dentist\Clinic::class);
    }
    public function user(){
        return $this->belongsTo('Dentist\User');
    }
    public function job(){
        return $this->belongsTo('Dentist\Job');
    }

}
