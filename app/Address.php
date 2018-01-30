<?php

namespace Dentist;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function clinic()
    {
        return $this->hasOne(\Dentist\Clinic::class);
    }
}
