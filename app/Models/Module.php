<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'slug',
        'completion',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function books() : HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function quizzes() : HasMany {
        return $this->hasMany(Quiz::class);
    }

    public function contents() : HasMany
    {
        return $this->hasMany(Content::class);
    }

    public function enrollments() : HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

}
