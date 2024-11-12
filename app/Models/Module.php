<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        return $this->belongsTo(Module::class);
    }

    public function Category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
