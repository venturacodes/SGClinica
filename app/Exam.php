<?php

namespace App;

use App\Client;
use App\Result;
use App\ExamType;
use App\Collaborator;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['client_id', 'collaborator_id', 'exam_type_id', 'note', 'file'];

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
    public function result(){
        return $this->hasOne(Result::class);
    }
}
