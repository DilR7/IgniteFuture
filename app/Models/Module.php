<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';
    protected $primaryKey = 'moduleID'; 
    protected $fillable = [
        'module_name',
        'module_desc',
        'completion',
        'userID',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');  
    }

}
