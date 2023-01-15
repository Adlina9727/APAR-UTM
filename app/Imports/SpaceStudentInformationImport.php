<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\StudentInformation;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentInformationImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    protected $formFileId;
    protected $userId;

    function __construct($formFileId) {
        // function __construct($fileId, $userId) {
            $this->formFileId = $formFileId;
            // $this->userId = $userId;
        }

    public function model(array $row)
    {
        return new StudentInformation([

            'No'     => $row[0],
            'Name'    => $row[1],
            'IC' => $row[2],
            'matric' => $row[3],
            'program' => $row[4],
            'formFile' => $this->formFileId,
            'user_id' => Auth()->id()

        ]);
    }
}
