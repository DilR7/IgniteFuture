<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $primaryKey = 'questionID';
    public function answers()
    {
        return $this->hasMany(Question::class, 'quizID', 'quizID');
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quizID', 'quizID');
    }
}
