<?php

namespace Dentist;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use  Notifiable;
    const ADMIN_ROLE = 1;
    const COLLABORATOR_ROLE = 2;
    const SECRETARY_ROLE = 3;
    const CLIENT_ROLE = 4;
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
        return $this->belongsTo(\Dentist\Role::class, 'id');
    }
    /**
     * Method that checks if a user is admin or not, useful to give only admin methods.
     * @return bool
     */
    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'Admin') {
                return true;
            }
        }

        return false;
    }
    public function isDentist()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'Dentista') {
                return true;
            }
        }

        return false;
    }
    public function client()
    {
            return $this->hasOne(\Dentist\Client::class);
    }
    public function clinic()
    {
        return $this->hasMany(\Dentist\Clinic::class);
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
