<?php

namespace Dentist;

use Illuminate\Database\Eloquent\Model;
/**
 * Eloquent model for class Client
 */
class Client extends Model
{
    protected $fillable = ['name','phone',];
    /**
     * Relationship between Clinics and Client must be many to many
     *
     * @return void
     */
    public function clinics()
    {
        return $this->belongsToMany(\Dentist\Clinic::class);
    }
}
