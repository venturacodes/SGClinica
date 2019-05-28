<?php

namespace App;

use App\Medicine;
use Illuminate\Database\Eloquent\Model;

class PrescriptMedicine extends Model
{
    protected $fillable = ['medicine_id','form_of_use','period','quantity'];
    
    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
    public function receipts(){
        return $this->belongsToMany(Receipt::class, 'receipt_prescript_medicine');
    }
}
