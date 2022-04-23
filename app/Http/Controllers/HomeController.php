<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentMark;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function addStudent()
    {
        
        $students = Student::all();
        return view('student',compact('students'));
    }

    public function addStudentEdit($id)
    {
        $students = Student::where('id',$id)->first();
        return view('studentedit', compact('students'));
    }
    
    public function addStudentInsert(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'reporting_teacher' => 'required',
        ]);

        Student::create($request->all());

        $students = Student::all();
        return view('student',compact('students'));
    }

    public function addStudentDelete($id)
    {
        $student_results_delete = StudentMark::where('student_id',$id)->delete();
        $deleted = Student::where('id',$id)->delete();
        $students = Student::all();
        return view('student',compact('students'));
    }

    public function studentUpdate(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'reporting_teacher' => 'required',
        ]);

        $request_data = [];
        $request_data['name'] = $request->name;
        $request_data['age'] = $request->age;
        $request_data['gender'] = $request->gender;
        $request_data['reporting_teacher'] = $request->reporting_teacher;
        
        Student::where('id', $request->id)->update($request_data);
        $students = Student::all();
        
        return view('student',compact('students'));

    }
    


    



    public function addStudentMark()
    {
    
        $student_lists = Student::pluck('id','name');
        $student_results = StudentMark::get();
        
    
        return view('mark',compact('student_lists','student_results'));
        // return view('table',compact('titles','emi_details'));
    }
    public function addStudentMarkInsert(Request $request)
    {
        
        $validatedData = $request->validate([
            'student_id' => 'required',
            'term' => 'required',
            'math' => 'required',
            'science' => 'required',
            'history' => 'required',
        ]);
        $total_marks=(int)$request->math+(int)$request->science+(int)$request->history;
        $request->request->add(['total_marks' => $total_marks]);

        StudentMark::create($request->all());
        $student_lists = Student::pluck('id','name');
        $students = StudentMark::all();
        $student_results = StudentMark::get();

        return view('mark',compact('students','student_lists','student_results'));
    }
    public function addStudentMarkUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required',
            'term' => 'required',
            'math' => 'required',
            'science' => 'required',
            'history' => 'required',
        ]);
        
        $total_marks=(int)$request->math+(int)$request->science+(int)$request->history;
        $request_data = [];
        $request_data['student_id'] = $request->student_id;
        $request_data['term'] = $request->term;
        $request_data['math'] = $request->math;
        $request_data['science'] = $request->science;
        $request_data['history'] = $request->history;
        $request_data['total_marks'] = $request->history;
        
        // Update contact us
        StudentMark::where('id', $request->id)->update($request_data);
        $student_lists = Student::pluck('id','name');
        $student_results = StudentMark::get();
        return view('mark',compact('student_lists','student_results'));

        // return view('table',compact('titles','emi_details'));
    }

    public function addStudentMarkEdit($id)
    {
        $student_lists = Student::pluck('id','name');
        $student_mark = StudentMark::where('id',$id)->first();

        return view('markedit', compact('student_lists','student_mark'));
    }

    public function addStudentMarkDelete($id)
    {

        $students = StudentMark::where('id',$id)->delete();
        $student_lists = Student::pluck('id','name');
        $student_results = StudentMark::get();
        return view('mark',compact('student_lists','student_results'));
    }

}
