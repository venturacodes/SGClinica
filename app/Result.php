<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['exam_id','collaborator_id', 'client_id', 'result'];
}
