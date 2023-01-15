<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SpaceStudentImport implements ToModel, WithHeadingRow
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
        // dd(substr($row['po1'], 0, -3));
        return new Student([
            'name' => $row['name'],
            'course' => $row['course'],
            'session' => $row['session'],
            'sem' => $row['sem'],
            'PO1' => substr($row['PO1'], 0, -3),
            'PO2' => substr($row['PO2'], 0, -3),
            'PO3' => substr($row['PO3'], 0, -3),
            'PO4' => substr($row['PO4'], 0, -3),
            'PO5' => substr($row['PO5'], 0, -3),
            'PO6' => substr($row['PO6'], 0, -3),
            'PO7' => substr($row['PO7'], 0, -3),
            'PO8' => substr($row['PO8'], 0, -3),
            'PO9' => substr($row['PO9'], 0, -3),
            'PO10' => substr($row['PO10'], 0, -3),
            'file_id' => $this->fileId,
            // 'user_id' => $this->userId,
        ]);
    }
}
