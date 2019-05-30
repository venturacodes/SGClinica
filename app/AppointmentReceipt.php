<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentReceipt extends Model
{
    protected $table = 'appointments_receipts';
    protected $fillable = ['appointment_id', 'receipt_id'];
}
