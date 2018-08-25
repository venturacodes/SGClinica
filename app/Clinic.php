<?php

namespace Dentist;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public function clients(){
        return $this->belongsToMany(\Dentist\Client::class);
    }
    public function collaborators(){
        return $this->belongsToMany(\Dentist\Collaborator::class);
    }
    public function appointments(){
        return $this->hasMany(\Dentist\Appointment::class);
    }
    public function collaborator(){
        return $this->hasOne('Dentist\Collaborator');
    }
    protected $fillable = [
        'name', 'address',
    ];
}
