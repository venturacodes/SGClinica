<?php

namespace App;

use App\PrescriptMedicine;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = ['client_id', 'medicine_id','collaborator_id', 'form_of_use', 'period', 'quantity'];
    
    public function Client(){
        return $this->belongsTo(\App\Client::class);
    }
    public function Collaborator(){
        return $this->belongsTo(\App\Collaborator::class);
    }
    public function PrescriptMedicines(){
        return $this->belongsToMany(PrescriptMedicine::class,'receipt_prescript_medicine');
    }      
}
