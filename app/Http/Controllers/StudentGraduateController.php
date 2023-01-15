<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use App\Models\Image;
use App\Exports\ExcelTableExport;
use App\Imports\StudentInformationImport;
use App\Imports\SpaceStudentInformationImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\StudentKPI;

class StudentGraduateController extends Controller
{
    public function fileImportExport()
    {
       return view('file-import');
    }

   public function fileExport()
   {
       return Excel::download(new ExcelStudentInformationExport, 'graduationsession.xlsx');
   }
    public function uploadStudentGraduates(Request $request)
   {
    Excel::import(new StudentInformationImport, $request->file('file')->store('temp'));
    return redirect()->route('dashboard')->with('success', 'Student Information Import Successfully');
   }
}
