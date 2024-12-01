<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['text', 'point', 'quiz_id'];
    
    use HasFactory;
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
