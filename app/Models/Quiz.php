<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $primaryKey = 'quizID';

    protected $fillable = [
        'title',
        'quiz_desc',
        'score',
        'userID', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'quizID', 'quizID');
    }
}
