<?php

namespace Dentist;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{

    public function collaborator(){
        return $this->hasOne('Dentist\Collaborator');
    }
    protected $fillable = [
        'name',
    ];
}
