<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Subject;
use App\Assignment;
use App\Student;
use App\Solution;


class ScoreController extends Controller
{
    function myscore(Request $request)
    {
        $st_id = $request->session()->get('student_id');
        if($st_id)
        {
            $student = Student::where('st_id', $st_id)->get();
            $subjects = Subject::where([
                'course_id' => $student[0]->course_id,
                'semester_id' => $student[0]->semester_id
                ])->get();
                
            $all_marks = array();
            $all_assign = array();
            $st_solutions = Solution::where([
                'solutions.student_id' => $st_id
                ])->join('assignments', 'assignments.as_id', '=', 'solutions.que_ass_id')->get();

            foreach( $st_solutions as $solu ) {
                array_push($all_marks, $solu->marks);
                array_push($all_assign, $solu->title);
                
            }
            $report = array();
            $total_assigns = Assignment::where([
                'course_id' => $student[0]->course_id,
                'semester_id' => $student[0]->semester_id
                ])->count();
            $uploaded_count = Solution::where([
                'student_id' => $student[0]->st_id,
                'status' => FALSE
                ])->count();
                array_push($report, $uploaded_count);
            $completed_count = Solution::where([
                'student_id' => $student[0]->st_id,
                'status' => TRUE
                ])->count();
                array_push($report, $completed_count);
            $remaining_count = $total_assigns - ($uploaded_count + $completed_count);
                array_push($report, $remaining_count);
            
            return view('myscore',['subjects'=>$subjects, 'marks'=>$all_marks, 'assigns'=>$all_assign, 'report'=>$report, 'total_assign'=>$total_assigns]);
            
        }
        else
            return redirect('student_login'); 
    }

}
