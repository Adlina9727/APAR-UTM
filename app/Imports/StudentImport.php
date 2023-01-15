<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param Collection $collection
    */

    protected $fileId;
    protected $userId;

    function __construct($fileId) {
    // function __construct($fileId, $userId) {
        $this->fileId = $fileId;
        // $this->userId = $userId;
    }

    public function model(array $row)
    {
        //if($row[10])
        return new Student([
            'no' => $row[0],
            'name' => $row[1],
            'course' => $row[2],
            'program' => $row[3],
            'year' => $row[4],
            'lecturer' => $row[5],
            'session' => $row[6],
            'sem' => $row[7],
            'section' => $row[8],
            'IC' => $row[9],
            'matric' => $row[10],
            'PO1' => $row[11] ,
            'PO2' => $row[12],
            'PO3' => $row[13],
            'PO4' => $row[14],
            'PO5' => $row[15],
            'PO6' => $row[16],
            'PO7' => $row[17],
            'PO8' => $row[18],
            'PO9' => $row[19],
            'PO10' => $row[20],
            'file_id' => $this->fileId,
            'user_id' => Auth()->id()
            // 'user_id' => $this->userId,
        ]);
    }
}
