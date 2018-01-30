<?php

namespace Dentist;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function clinics()
    {
        return $this->belongsToMany(\Dentist\Clinic::class);
    }
    public function user()
    {
        return $this->belongsTo(\Dentist\User::class);
    }
    public function prepare(array $data)
    {
        $this->user_id = $data['user_id'];
        $this->name = $data['name'];
        $this->phone = $data['phone'];
    }
}
