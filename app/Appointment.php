<?php

namespace Dentist;

use Illuminate\Database\Eloquent\Model;
use \Dentist\Clinic as Clinic;

class Appointment extends Model
{
    public function clinic(){
        return $this->belongsTo(Clinic::class);
    }
    public function client(){
        return $this->hasOne(Client::class);
    }
    public function collaborator(){
        return $this->hasOne(Collaborator::class);
    }
}
