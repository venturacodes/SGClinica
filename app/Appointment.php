<?php

namespace Dentist;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use \Dentist\Clinic as Clinic;

class Appointment extends Model
{
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
    public function client()
    {
        return $this->hasOne(Client::class);
    }
    public function collaborator()
    {
        return $this->hasOne(Collaborator::class);
    }
    public function checkIfAlreadyBooked(Carbon $start_time, Carbon $end_time, $clinic_id)
    {
        $appointment = $this->where('clinic_id', '=', $clinic_id)
            ->where('start_time', '<=', $start_time->subMinutes(29))
            ->where('end_time', '>=', $end_time->addMinutes(29))
            ->exists();
        
        return $appointment;
    }
    public function prepare(Request $request)
    {
        $this->start_time = $request->start_time;
        $this->end_time = $request->end_time;
        $this->clinic_id = $request->clinic_id;
        $this->client_id = $request->client_id;
        $this->collaborator_id = $request->collaborator_id;
        $this->user_id = $request->user_id;
        $this->appointment_status_id = $request->appointment_status_id;
        $this->note = $request->note;
    }
}
