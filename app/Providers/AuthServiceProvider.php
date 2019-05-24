<?php

namespace App\Providers;

use App\Client;
use App\Medicine;
use App\Appointment;
use App\Collaborator;
use App\Policies\ClientPolicy;
use Laravel\Passport\Passport;
use App\Policies\MedicinePolicy;
use App\Policies\AppointmentPolicy;
use App\Policies\CollaboratorPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Appointment::class => AppointmentPolicy::class,
        Collaborator::class => CollaboratorPolicy::class,
        Medicine::class => MedicinePolicy::class,
        Client::class => ClientPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
