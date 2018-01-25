<?php

namespace Dentist;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function client(){
        return $this->belongsTo(\Dentist\Client::class);
    }
    public function clinic(){
        return $this->hasOne(\Dentist\Clinic::class);
    }
}
