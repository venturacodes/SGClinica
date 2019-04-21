<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Clinic as Clinic;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    const DEFAULT_DURATION = 30;
    protected $fillable = [
    'title'
    , 'start'
    , 'end'
    , 'client_id'
    , 'collaborator_id'
    , 'user_id'
    , 'note'
];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }
    public function prepare(array $data)
    {
        $this->start = $data['start'];
        $this->end = $data['end'];
        $this->client_id = $data['client'];
        $this->collaborator_id = $data['collaborator'];
        $this->note = $data['note'];
    }
}
