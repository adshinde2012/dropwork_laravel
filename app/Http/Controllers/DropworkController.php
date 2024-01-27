<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Semester;
use App\Student;
use App\Teacher;
use App\Subject;
use App\Assignment;

class DropworkController extends Controller
{
    //
    function home()
    {
        return view('home');
    }
    function register()
    {
        $courses = Course::all();
        $semesters = Semester::all();
        return view('register',['courses'=>$courses, 'semesters'=>$semesters]);
        //return view('register', ['courses'=> $courses]);
    }
    function post_register(Request $request)
    {
        $student = new Student([
            'roll_no' => $request->get('rollno'),
            'first_name' => $request->get('firstname'),
            'last_name' => $request->get('lastname'),
            'email' => $request->get('email'),
            'password' => $request->get('pass'),
            'course_id' => $request->get('courses'),
            'semester_id' => $request->get('sem')
            
        ]);
        $student->save();
        return redirect('student_login');
        //return view('register',['courses'=>$courses, 'semesters'=>$semesters]);
        //return view('register', ['courses'=> $courses]);
    }
    function student_login()
    {
        return view('student_login');
    }
    function post_student_login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('pass');
        $student = Student::where('email', $email)->get();
        $error_msg = null;
        if ($student->count() > 0)
        {
            if($student[0]->password == $password)
            {
                //Session::put('student_id', $student[0]->id);
                //session(['key' => 'value']);
                $request->session()->put('student_id',$student[0]->st_id);
                return redirect('student_dashboard');
            }
            else
            {
                $error_msg = "Invalid Email or Password !!";
                return view('student_login',['error'=>$error_msg]);
            }
        }
        else
        {
            $error_msg = "Invalid Email or Password !!";
            return view('student_login',['error'=>$error_msg]);
        }
            
    }
    function teacher_login()
    {
        return view('teacher/teacher_login');
    }
    function post_teacher_login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('pass');
        $teacher = Teacher::where('email', $email)->get();
        $error_msg = null;
        if ($teacher->count() > 0)
        {
            if($teacher[0]->password == $password)
            {
                //Session::put('student_id', $student[0]->id);
                //session(['key' => 'value']);
                $request->session()->put('teacher_id',$teacher[0]->t_id);
                return redirect('teacher_dashboard');
            }
            else
            {
                $error_msg = "Invalid Email or Password !!";
                return view('teacher/teacher_login',['error'=>$error_msg]);
            }
        }
        else
        {
            $error_msg = "Invalid Email or Password !!";
            return view('teacher/teacher_login',['error'=>$error_msg]);
        }
        return view('teacher/teacher_login');
    }
    
    function teacher_registration()
    {
        return view('teacher/teacher_registration');
    }
    function post_teacher_registration(Request $request)
    {
        $teacher = new Teacher([
            'first_name' => $request->get('firstname'),
            'last_name' => $request->get('lastname'),
            'email' => $request->get('email'),
            'password' => $request->get('pass'),
            
        ]);
        $teacher->save();
        return redirect('teacher_login');
    }

    function student_dashboard(Request $request)
    {   
        $st_id = $request->session()->get('student_id');
        if($st_id){
            $student = Student::where('st_id', $st_id)->get();
            $subjects = Subject::where([
                'course_id' => $student[0]->course_id,
                'semester_id' => $student[0]->semester_id
                ])->get();
            $sub_assigns = [];
            foreach( $subjects as $sub ) {
                $assigns = Assignment::where('subject_id', $sub->sub_id)->count();
                $sub_assigns[$sub->sub_name] = $assigns;
            }
            return view('student_dashboard',['student'=>$student,'subjects'=>$sub_assigns]);
        }
        else
            return redirect('student_login'); 
    }
    function teacher_dashboard(Request $request)
    {
        $t_id = $request->session()->get('teacher_id');
        if ($t_id){
            $teacher = Teacher::where('t_id', $t_id)->get();
            return view('teacher/teacher_dashboard',['teacher'=>$teacher]);
        }
        else
            return redirect('teacher_login');
        
    }
    function student_logout(Request $request)
    {
        $request->session()->forget('student_id');
        return redirect('student_login');
    }
    function teacher_logout(Request $request)
    {
        $request->session()->forget('teacher_id');
        return redirect('teacher_login');
    }
}
