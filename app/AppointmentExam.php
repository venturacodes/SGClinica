<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppointmentExam extends Model
{
    protected $table = 'appointments_exams';
    protected $fillable = ['appointment_id', 'exam_id'];
}
