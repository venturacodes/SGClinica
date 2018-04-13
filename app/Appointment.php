<?php

namespace Dentist;

use Carbon\Carbon;
use Illuminate\Http\Request;
use \Dentist\Clinic as Clinic;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    const DEFAULT_DURATION = 30;
    protected $fillable = [
    'title'
    , 'start'
    , 'end'
    , 'clinic_id'
    , 'client_id'
    , 'collaborator_id'
    , 'user_id'
    , 'appointment_status_id'
    , 'note'
];

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
        $period_start_time = new Carbon($start_time->toDateTimeString());
        $period_start_time->subMinutes(29);
        $query = $this->where('clinic_id', '=', $clinic_id)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->where('start', '>=', $start_time->toDateTimeString())
                    ->where('end', '<=', $end_time->toDateTimeString());
            })
            ->orWhere(function ($query) use ($period_start_time, $end_time) {
                    $query->where('start', '>=', $period_start_time->toDateTimeString())
                        ->where('end', '<=', $end_time->toDateTimeString());
            })->exists();
        return $query;
    }
    public function prepare(array $data)
    {
        $this->start = $data['start'];
        $this->end = $data['end'];
        $this->clinic_id = $data['clinic_id'];
        $this->client_id = $data['client_id'];
        $this->collaborator_id = $data['collaborator_id'];
        $this->appointment_status_id = $data['appointment_status_id'];
        $this->note = $data['note'];
    }
}
