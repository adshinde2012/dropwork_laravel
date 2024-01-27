<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Subject;
use App\Assignment;
use App\Student;
use App\Solution;

class StudentController extends Controller
{
    function subject_list(Request $request)
    {
        $st_id = $request->session()->get('student_id');
        $student = Student::where('st_id', $st_id)->get();
        if(!empty($st_id)){
            $subjects = Subject::where([
                'subjects.course_id' => $student[0]->course_id,
                'subjects.semester_id' => $student[0]->semester_id
                ])->join('teachers', 'subjects.assign_teacher_id', '=', 'teachers.t_id')->get();
    
            return view('subject_list',['subjects'=>$subjects]);
        }
        else
            return redirect('student_login');
        
    }
    function my_classmates(Request $request)
    {
        $st_id = $request->session()->get('student_id');
        $student = Student::where('st_id', $st_id)->get();
        if(!empty($st_id)){
            $classmates = Student::where([
                'course_id' => $student[0]->course_id,
                'semester_id' => $student[0]->semester_id
                ])->get();
    
            return view('my_classmates',['classmates'=>$classmates]);
        }
        else
            return redirect('student_login'); 
    }

    function todo_list(Request $request)
    {
        $st_id = $request->session()->get('student_id');
        $student = Student::where('st_id', $st_id)->get();

        $todolist = array();
        $que_assigns = Assignment::where([
            'course_id' => $student[0]->course_id,
            'semester_id' => $student[0]->semester_id
            ])->get();
        $ans_assigns = Solution::where('student_id', $st_id)->get();
        $ans_assign_ids = array();
        foreach ($ans_assigns as $ans)
        {
            array_push($ans_assign_ids, $ans->que_ass_id);
        }
        foreach ($que_assigns as $que)
        {
            if(in_array($que->as_id , $ans_assign_ids) == FALSE)
            {
                $assignment = Assignment::where('as_id', $que->as_id)->
                    join('subjects', 'subjects.sub_id', '=', 'assignments.subject_id')->get();
                array_push($todolist, $assignment[0]);
            }
        }
        
        return view('todo_list',['todolist'=>$todolist]);
    }

    function update_profile(Request $request)
    {
        $st_id = $request->session()->get('student_id');
        $student = Student::where('st_id', $st_id)->get();
        if(!empty($st_id)){
            $student = Student::where([
                'st_id' => $st_id
                ])
                ->join('courses', 'courses.c_id', '=', 'students.course_id')
                ->join('semesters', 'semesters.sem_id', '=', 'students.semester_id')->get();
    
            return view('update_profile',['student'=>$student]);
        }
        else
            return redirect('student_login'); 
    }

}
