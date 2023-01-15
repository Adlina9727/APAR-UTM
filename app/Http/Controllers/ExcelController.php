<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Exports\ExcelStudentExport;
use Maatwebsite\Excel\Facades\Excel;



class ExcelController extends Controller
{
    public function show(File $file)
    {
        $students = $file->students()->get();

        return view('show', compact('students'));
    }

    public function export(File $file)
    {
        $students = Student::get();

        return Excel::download(new ExcelStudentExport($students), $file->name . '.xlsx');
    }

    public function exportMerge(Request $request)
    {
        $merged = File::whereIn('id', $request->get('files'))->get();
        $sC = collect();

        foreach ($merged as $m) {
            $tSC = $m->students()->get();
            $sC = $sC->merge($tSC);
        }

        return Excel::download(new ExcelStudentExport($sC), 'Merged' . '.xlsx');
    }
}
