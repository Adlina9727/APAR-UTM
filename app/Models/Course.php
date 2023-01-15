<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';

    protected $fillable = [
        'course',
        'course_name',
        'year_offer',
        'semester_offer',
        'credit_hour'
    ];

    public function students(){
        return $this->hasMany(Student::class, 'course','course');
    }




}
