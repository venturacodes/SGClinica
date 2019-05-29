<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiptPrescriptMedicine extends Model
{
    protected $table = 'receipt_prescript_medicine';
    protected $fillable = ['prescript_medicine_id', 'receipt_id'];
}
