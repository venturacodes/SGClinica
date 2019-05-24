<?php

namespace App\Policies;

use App\User;
use App\Collaborator;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollaboratorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the collaborator.
     *
     * @param  \App\User  $user
     * @param  \App\Collaborator  $collaborator
     * @return mixed
     */
    public function seeCollaborators(User $user, Collaborator $collaborator)
    {
        return $user->role->level == 2;
    }

}
