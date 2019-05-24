<?php

namespace App\Policies;

use App\User;
use App\Medicine;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the medicine.
     * Level 1 é medico
     *
     * @param  \App\User  $user
     * @param  \App\Medicine  $medicine
     * @return mixed
     */
    public function seeMedicines(User $user)
    {
        return $user->role->level == 1;
    }
}
