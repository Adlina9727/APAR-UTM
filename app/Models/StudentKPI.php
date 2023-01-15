<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentKPI extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'course',
        'kpi_PO1',
        'kpi_PO2',
        'kpi_PO3',
        'kpi_PO4',
        'kpi_PO5',
        'kpi_PO6',
        'kpi_PO7',
        'kpi_PO8',
        'kpi_PO9',
        'kpi_PO10',
        'file_id',
        'user_id'
    ];

}

