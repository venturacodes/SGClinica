<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Eloquent model for class Client
 */
class Client extends Model
{
    protected $fillable = ['clinic_id','name','phone', 'email'];
    
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
