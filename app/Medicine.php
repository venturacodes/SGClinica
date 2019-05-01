<?php

namespace App;

use App\Receipt;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['generic_name', 'manufacturer_name', 'manufacturer'];

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}
