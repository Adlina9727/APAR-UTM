<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;
    public function studentfile()
    {
        return $this->belongsTo(StudentFile::class);
    }

    protected $fillable = [

        'No',
        'Name',
        'IC',
        'program',
        'matric',
        'formFile',
        'user_id'
    ];

}
