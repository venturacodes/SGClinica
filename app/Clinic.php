<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public function clients(){
        return $this->belongsToMany(\App\Client::class);
    }
    public function collaborators(){
        return $this->belongsToMany(\App\Collaborator::class);
    }
    public function appointments(){
        return $this->hasMany(\App\Appointment::class);
    }
    public function collaborator(){
        return $this->hasOne('App\Collaborator');
    }
    protected $fillable = [
        'name', 'email', 'phone', 'address'
    ];
}
