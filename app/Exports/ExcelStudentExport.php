<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelStudentExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $students;

    function __construct($students) {
        $this->students = $students;
    }

    public function view(): View
    {
        // dd($this->table);
        // $project = $this->project;
        return view('excelStudent', [
            'students' => $this->students,
        ]);
    }
}