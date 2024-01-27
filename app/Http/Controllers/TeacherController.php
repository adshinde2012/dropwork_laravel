<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Subject;
use App\Assignment;
use App\Student;
use App\Solution;

class TeacherController extends Controller
{
    function my_subjects(Request $request)
    {
        $t_id = $request->session()->get('teacher_id');
        $teacher = Teacher::where('t_id', $t_id)->get();
        if($t_id)
        {
            $subjects = Subject::where('subjects.assign_teacher_id', $t_id)->
                join('courses', 'subjects.course_id', '=', 'courses.c_id')->
                join('semesters', 'subjects.semester_id', '=', 'semesters.sem_id')->get();
    
            return view('teacher/my_subjects',['subjects'=>$subjects]);
        }
        else
            return redirect('teacher_login'); 
        
    }
    function my_assignments(Request $request, $assign_id=0)
    {
        $t_id = $request->session()->get('teacher_id');
        $teacher = Teacher::where('t_id', $t_id)->get();
        if($t_id)
        {
            $subjects = Subject::where('subjects.assign_teacher_id', $t_id)->
                join('courses', 'subjects.course_id', '=', 'courses.c_id')->
                join('semesters', 'subjects.semester_id', '=', 'semesters.sem_id')->get();

            if($assign_id !=0){
                Assignment::where('as_id',$assign_id)->delete();
                return redirect()->back()->with('message', 'Assignment deleted successfully !!');
            }
                
            $sub_id = $request->get('subject');
            $assignments = NULL;
            if($sub_id)
            {
                $assignments = Assignment::where([
                    'teacher_id'=>$t_id,
                    'subject_id'=>$sub_id])->get();

                return view('teacher/my_assignments',['subjects'=>$subjects, 'assignments'=>$assignments]);
            }
            else
                return view('teacher/my_assignments',['subjects'=>$subjects, 'assignments'=>$assignments]);
        }
        else
            return redirect('teacher_login'); 
        
    }
    function all_students(Request $request)
    {
        $t_id = $request->session()->get('teacher_id');
        $teacher = Teacher::where('t_id', $t_id)->get();
        if($t_id)
        {
            $students = Student::all();
    
            return view('teacher/all_students',['students'=>$students]);
        }
        else
            return redirect('teacher_login'); 
        
    }
}
