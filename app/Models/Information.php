<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $table = 'informations';

    protected $fillable = [
        'id',
        'graduation_session',
        'graduation_semester',
        'total_student',
        'formFile',
        'user_id'

    ];
}
