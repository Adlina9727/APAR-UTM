<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function files()
    {
        return $this->belongsTo(File::class);
    }

    protected $fillable = [
        'id',
        'no',
        'name',
        'course',
        'program',
        'year',
        'lecturer',
        'session',
        'sem',
        'section',
        'IC',
        'matric',
        'PO1',
        'PO2',
        'PO3',
        'PO4',
        'PO5',
        'PO6',
        'PO7',
        'PO8',
        'PO9',
        'PO10',
        'file_id',
        'user_id'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function file(){
        return $this->hasOne(File::class, 'id', 'file_id');
    }

}


