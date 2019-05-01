<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public $fillable = ['client_id', 'medicine_id','collaborator_id', 'form_of_use'];
    
    public function Client(){
        return $this->belongsTo(\App\Client::class);
    }
    public function Collaborator(){
        return $this->belongsTo(\App\Collaborator::class);
    }
    public function Medicine(){
        return $this->belongsTo(\App\Medicine::class);
    }        
}
