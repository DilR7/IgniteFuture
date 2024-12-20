<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Point extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'quiz_id',
        'score',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
