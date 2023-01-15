<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Auth;
use App\Models\Course;

class StudentController extends Controller
{
    public function excelView()
    {
        $user_id = Auth::id();
        $students = Student::latest()->paginate(10);
        // dd($students[0]->file->user_id);
        // $students = Student::latest()->paginate(10);
        return view('excelView', compact('students','user_id'));
    }
     public function resultStudentData()
        {
            $students = Student::all();
            $courses = Course::all();
            $offer_subject1 = Course::where('year_offer','1')->where('semester_offer','2')->get(['course']);
            $sem_offer_subject2 = Course::where('year_offer','1')->where('semester_offer','2')->get(['course_name']);
            $plucked = $offer_subject1->pluck('course');
            //($plucked);
            $plucked2 = $sem_offer_subject2->pluck('course_name');
            //$course_code = $plucked->values('course');
            //$course_name = $plucked2->values('course_name');


            return view('resultData', compact('students','courses','offer_subject1','sem_offer_subject2','plucked','plucked2'));
        }

        public function resultStudentDataMean()
        {
            $students = Student::all();
            $stdnt_subject = Student::select('course')->groupBy('course')->get();
            $stdnt_subject_count = count($stdnt_subject);


            $courses = Course::all();
            //$test = $course[1]->students;
             //dd($test);

            return view('resultDataMean', compact('students','stdnt_subject', 'stdnt_subject_count','courses'));
        }

        public function resultStudentDataPass()
        {
            $students = Student::all();
            $stdnt_subject = Student::select('course')->groupBy('course')->get();
            $stdnt_subject_count = count($stdnt_subject);


            $courses = Course::all();
            // $test = $course[1]->students;
            // dd($test);

            return view('resultDataPass', compact('students','stdnt_subject', 'stdnt_subject_count','courses'));
        }


        public function resultStudentDataPass2($year)
        {
            $students = Student::select('year')->where('year', $year)->get();
            $courses = Course::all();
            return view('resultDataPass', compact('students','courses','year'));
        }

        public function resultStudentDataPassByYear()
        {
            $years = Student::select('year')->groupBy('year')->get();
            return view('resultDataPassByYear', compact('years'));
        }







}
