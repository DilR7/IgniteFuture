<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function enrollments() : HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function modules() : BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'enrollments');
    }
    
    public function scores() : HasMany
    {
        return $this->hasMany(Point::class);
    }

    public function contents() : BelongsToMany
    {
        return $this->belongsToMany(Content::class, 'content_user', 'user_id', 'content_id')
                    ->withPivot('completed')
                    ->withTimestamps();
    }
}
