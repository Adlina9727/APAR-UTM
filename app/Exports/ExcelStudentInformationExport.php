<?php

namespace App\Exports;

use App\Models\StudentInformation;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelStudentInformationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StudentInformation::all();
    }
}
