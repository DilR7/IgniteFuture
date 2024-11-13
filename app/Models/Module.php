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

    public function User() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function Book() : HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function quiz(){
        return $this->hasMany(Quiz::class);
    }

}
