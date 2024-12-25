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
        'video',
        'module_id'
    ];

    public function module() : BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function users()
    {   
        return $this->belongsToMany(User::class, 'content_user', 'content_id', 'user_id')
                    ->withPivot('completed')
                    ->withTimestamps();
    }


}


