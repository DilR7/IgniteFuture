<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'slug',
        'desc',
        'video'
    ];

    public function module() : BelongsTo
    {
        return $this->belongsTo(Module::class);
    }
}


