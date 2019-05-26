<?php

namespace App\Policies;

use App\User;
use App\Appointment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;

    /**
     * level 1 é medico
     */
    public function seeNextAppointments(User $user)
    {
        return auth()->user()->role->level == 1;
    }

    /**
     * Acima de 1 são secretaria, Gestor and Admin
     */
    public function seeAgendas(User $user)
    {
        return auth()->user()->role->level > 1;
    }
    /**
     * Acima de 2 são Gestor and Admin
     */
    public function seeReports(User $user)
    {
        return $user->role->level > 2;
    }

    /**
     * Determine whether the user can create appointments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Appointment  $appointment
     * @return mixed
     */
    public function update(User $user, Appointment $appointment)
    {
        //
    }

    /**
     * Determine whether the user can delete the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Appointment  $appointment
     * @return mixed
     */
    public function delete(User $user, Appointment $appointment)
    {
        //
    }

    /**
     * Determine whether the user can restore the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Appointment  $appointment
     * @return mixed
     */
    public function restore(User $user, Appointment $appointment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the appointment.
     *
     * @param  \App\User  $user
     * @param  \App\Appointment  $appointment
     * @return mixed
     */
    public function forceDelete(User $user, Appointment $appointment)
    {
        //
    }
}
