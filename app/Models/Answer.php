<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answers';
    protected $primaryKey = 'answerID';
    public function question()
    {
        return $this->hasMany(Answer::class, 'questionID', 'questionID');
    }
}
