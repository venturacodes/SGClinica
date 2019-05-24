<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['client_id', 'collaborator_id', 'exam_type_id', 'name', 'file'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }
    public function examType()
    {
        return $this->belongsTo(ExamType::class);
    }
}
