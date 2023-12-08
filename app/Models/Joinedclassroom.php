<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joinedclassroom extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'classroomId',
        'userId',
    ];
}
