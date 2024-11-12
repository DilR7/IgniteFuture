<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'categoryID';
    protected $fillable = 'category';

    public function module()
    {
        return $this->hasMany(Module::class, 'moduleID', 'moduleID');
    }
}
