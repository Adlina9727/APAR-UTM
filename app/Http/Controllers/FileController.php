<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use App\Models\Image;
use App\Models\Student;
use App\Models\Course;
use App\Exports\ExcelTableExport;
use App\Imports\StudentImport;
use App\Imports\SpaceStudentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\StudentKPI;

class FileController extends Controller
{
    public function fileUpload(Request $req){
        $req->validate([
            'files' => 'required',
            'files.*' => 'mimes:html,xlsx|max:2048',
        ]);

        if($req->hasfile('files'))
        {
            foreach($req->file('files') as $file)
            {
                $fileModel = new File;
                $fileId = 0;

                if($file->getClientmimeType() == 'text/html')
                {

                    $string = ' ' . $file->get();
                    $ini = strpos($string, '<table border=0>');
                    $ini += strlen('<table border=0>');
                    $len = strpos($string, '</table>', $ini) - $ini;
                    $table = substr($string, $ini, $len);
                    $table = substr($table, strpos($table, '</tr>')+5);
                    $table = str_replace(' &nbsp;', '', $table);
                    $table = preg_replace("/<\/?a( [^>]*)?>/i", "", $table);
//remove all anchor tag
                    $fileName = $file->getClientOriginalName();
//set fileName
                    $tFileName = time().'_'.$fileName;
                    $filePath = $file->storeAs('uploads', $tFileName, 'public');
//set filePath and store the uploaded file to upload folder
                    $htmlTablePath = 'public/html_tables/'.$tFileName;
//set path for html table
                    Storage::disk('local')->put($htmlTablePath, $table);
//store html table
                    $excelPath = substr('public/excels/'.$tFileName, 0, -5);
//excel path
                    Excel::store(new ExcelTableExport($table), $excelPath.'.xlsx');
//store converted excel file but path?
                    $fileModel->name = $fileName;
//get fileNam to be saved in db
                    $fileModel->file_path = 'public/'.$filePath;
                    $fileModel->html_table_path = $htmlTablePath;
                    $fileModel->excel_path = $excelPath;
                    $fileModel->user_id = Auth()->id();
                    $fileModel->save();
                    $fileId = File::latest('created_at')->first()->id;
                    Excel::import(new StudentImport($fileId), $excelPath.'.xlsx');
                    usleep( 1000000 );
                }
                else
                {
                    // dd($file);
                    $fileName = $file->getClientOriginalName();
                    $tFileName = time().'_'.$fileName;
                    $filePath = $file->storeAs('uploads', $tFileName, 'public');
                    $fileModel->name = $fileName;
                    $fileModel->file_path = 'public/'.$filePath;
                    $fileModel->user_id = Auth()->id();
                    $fileModel->save();
                    $fileId = File::latest('created_at')->first()->id;
                    Excel::import(new SpaceStudentImport($fileId), $file);
                    usleep( 1000000 );
                }
            }

            //logic
            //select all data
            $students = Student::all();
            $courses = Course::all();

            foreach ($courses as $course1)
            {
                $PO1 = 0;
                $PO2 = 0;
                $PO3 = 0;
                $PO4 = 0;
                $PO5 = 0;
                $PO6 = 0;
                $PO7 = 0;
                $PO8 = 0;
                $PO9 = 0;
                $PO10 = 0;
                $i = 1;
                // dump($course1->course);
                // dump($course1->students->where('user_id', Auth()->id())->where('PO1', '>', 0)->count());

                $T_studentPassedPO1 = $course1->students->where('user_id', Auth()->id())->where('PO1', '>', 0)->count();
                $firstStudent = $course1->students->where('user_id', Auth()->id())->first();
                if($firstStudent != null){
                    $file_id = $firstStudent->file_id;
                    $user_id = Auth()->id();
                }else{
                    $file_id = null;
                    $user_id = null;
                }
                foreach ($course1->students as $student) {
                    if ($student->PO1 >= 65.0) {
                        $PO1++;
                    }
                }

                if(  $T_studentPassedPO1 != 0){
                    $resultPO1 = ($PO1/$T_studentPassedPO1)* 100 ;
                }else{
                    $resultPO1 = $PO1;
                }

                $new = StudentKPI::create([
                    'course' => $course1->course,
                    'kpi_PO1' => $resultPO1,
                    'file_id' => $file_id,
                    'user_id' => $user_id,
                ]);

                $T_studentPassedPO2 = $course1->students->where('user_id', Auth()->id())->where('PO2', '>', 0)->count();
                foreach ($course1->students as $student) {
                    if ($student->PO2 >= 65.0) {
                        $PO2++;
                    }
                }

                if(  $T_studentPassedPO2 != 0){
                    $resultPO2 = ($PO2/$T_studentPassedPO2)* 100;
                }else{
                    $resultPO2 = $PO2;
                }

                $new->update([
                    'kpi_PO2' => $resultPO2
                ]);

                $T_studentPassedPO3 = $course1->students->where('user_id', Auth()->id())->where('PO3', '>', 0)->count();
                foreach ($course1->students as $student) {
                    if ($student->PO3 >= 65.0) {
                        $PO3++;
                    }
                }
                if(  $T_studentPassedPO3 != 0){
                    $resultPO3 = ($PO3/$T_studentPassedPO3)* 100;
                }else{
                    $resultPO3 = $PO3;
                }

                $new->update([
                    'kpi_PO3' => $resultPO3
                ]);

                $T_studentPassedPO4 = $course1->students->where('user_id', Auth()->id())->where('PO4', '>', 0)->count();
                foreach ($course1->students as $student) {
                if ($student->PO4 >= 65.0) {
                 $PO4++;
                }
                }
                if(  $T_studentPassedPO4 != 0){
                 $resultPO4 = ($PO4/$T_studentPassedPO4) *100;
                 }else{
                $resultPO4 = $PO4;
                }

                $new->update([
                    'kpi_PO4' => $resultPO4
                ]);

                $T_studentPassedPO5 = $course1->students->where('user_id', Auth()->id())->where('PO5', '>', 0)->count();
                foreach ($course1->students as $student) {
                    if ($student->PO5 >= 65.0) {
                        $PO5++;
                    }
                }
                if(  $T_studentPassedPO5 != 0){
                    $resultPO5 = ($PO5/$T_studentPassedPO5) *100;
                }else{
                    $resultPO5 = $PO5;
                }
                $new->update([
                    'kpi_PO5' => $resultPO5
                ]);

                $T_studentPassedPO6 = $course1->students->where('user_id', Auth()->id())->where('PO6', '>', 0)->count();
                foreach ($course1->students as $student) {
                    if ($student->PO6 >= 65.0) {
                        $PO6++;
                    }
                }
                if(  $T_studentPassedPO6 != 0){
                    $resultPO6 = ($PO6/$T_studentPassedPO6) *100;
                }else{
                    $resultPO6 = $PO6;
                }

                $new->update([
                    'kpi_PO6' => $resultPO6
                ]);

                $T_studentPassedPO7 = $course1->students->where('user_id', Auth()->id())->where('PO7', '>', 0)->count();
                foreach ($course1->students as $student) {
                    if ($student->PO7 >= 65.0) {
                        $PO7++;
                    }
                }
                if(  $T_studentPassedPO7 != 0){
                    $resultPO7 = ($PO7/$T_studentPassedPO7) *100;
                }else{
                    $resultPO7 = $PO7;
                }

                $new->update([
                    'kpi_PO7' => $resultPO7
                ]);

                $T_studentPassedPO8 = $course1->students->where('user_id', Auth()->id())->where('PO8', '>', 0)->count();
                foreach ($course1->students as $student) {
                    if ($student->PO8 >= 65.0) {
                        $PO8++;
                    }
                }
                if(  $T_studentPassedPO8 != 0){
                    $resultPO8 = ($PO8/$T_studentPassedPO8) *100;
                }else{
                    $resultPO8 = $PO8;
                }

                $new->update([
                    'kpi_PO8' => $resultPO8
                ]);

                $T_studentPassedPO9 = $course1->students->where('user_id', Auth()->id())->where('PO9', '>', 0)->count();
                foreach ($course1->students as $student) {
                    if ($student->PO9 >= 65.0) {
                        $PO9++;
                    }
                }
                if(  $T_studentPassedPO9 != 0){
                    $resultPO9 = ($PO9/$T_studentPassedPO9) * 100;
                }else{
                    $resultPO9 = $PO9;
                }
                $new->update([
                    'kpi_PO9' => $resultPO9
                ]);

                $T_studentPassedPO10 = $course1->students->where('user_id', Auth()->id())->where('PO10', '>', 0)->count();
                foreach ($course1->students as $student) {
                    if ($student->PO10 >= 65.0) {
                        $PO10++;
                    }
                }
                if(  $T_studentPassedPO10 != 0){
                    $resultPO10 = ($PO10/$T_studentPassedPO10)*100;
                }else{
                    $resultPO10 = $PO10;
                }

                $new->update([
                    'kpi_PO10' => $resultPO10
                ]);
            }
        }
        // dd("done");
        return back()
            ->with('success','File has been uploaded.');
    }


    public function imageUpload(Request $req){
        $req->validate([
            'files' => 'required',
            'files.*' => 'mimes:jpeg,png',
        ]);

        if($req->hasfile('files'))
        {
            foreach($req->file('files') as $file)
            {
                $imageModel = new Image;

                $imageName = $file->getClientOriginalName();
                $tImageName = time().'_'.$imageName;
                $imagePath = $file->storeAs('images', $tImageName, 'public');
                $imageModel->name = $imageName;
                $imageModel->image_path = 'storage/'.$imagePath;
                $imageModel->save();
                usleep( 1000000 );
            }
        }

        return back()
            ->with('success','Image has been uploaded.');
    }

    public function postDelete(Request $req)
    {
        $files = File::whereIn('id', $req->get('files'))->get();

        foreach ($files as $file) {
            $file->delete();
        }

        return back()
            ->with('success','File has been deleted.');
    }

    public function postImageDelete(Request $req)
    {
        $images = Image::whereIn('id', $req->get('images'))->get();

        foreach ($images as $image) {
            $image->delete();
        }

        return back()
            ->with('success','Image has been deleted.');
    }
}
