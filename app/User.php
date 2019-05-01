<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class User extends Authenticatable
{
    use  Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * Relationship between Roles and User, so users can have roles inside the system.
     * @return mixed
     */
    public function role()
    {
        return $this->belongsTo(\App\Role::class, 'id');
    }
    public function client()
    {
            return $this->hasOne(\App\Client::class);
    }
    public function clinic()
    {
        return $this->hasMany(\App\Clinic::class);
    }
    public function prepare(array $data)
    {
        $this->email = $data['email'];
        $this->password = bcrypt($data['password']);
        $this->role_id = $data['role_id'];
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
