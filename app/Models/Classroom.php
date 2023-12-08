<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'classname',
        'classsubject',
        'authorId',
        'codeClass',
    ];

    public function joinedByUsers()
    {
        return $this->belongsToMany(User::class, 'joinedclassrooms', 'classroomId', 'userId');
    }
}
