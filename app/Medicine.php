<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['generic_name', 'manufacturer_name', 'manufacturer'];
}
