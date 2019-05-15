<?php

namespace App;

use App\Receipt;
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
    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
