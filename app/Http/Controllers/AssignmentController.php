<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Subject;
use App\Assignment;
use App\Student;
use App\Solution;
use \Datetime;


class AssignmentController extends Controller
{
    function upload_assignments(Request $request)
    {
        $t_id = $request->session()->get('teacher_id');
        $teacher = Teacher::where('t_id', $t_id)->get();
        $subjects = Subject::where('assign_teacher_id', $t_id)->get();
        
        return view('teacher/upload_assignments',['subjects'=>$subjects]);
    }
    function post_upload_assignments(Request $request)
    {
        $t_id = $request->session()->get('teacher_id');
        $teacher = Teacher::where('t_id', $t_id)->get();
        $subjects = Subject::where('assign_teacher_id', $t_id)->get();

        $sub = Subject::where('sub_id', $request->get('subject'))->get();

        $file = $request->file('file_url');
        $filename = $file->getClientOriginalName();
        $file->move('upload', $filename);
       
        $assign = new Assignment([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'file_url' => $filename,
            'points' => $request->get('points'),
            'start_date' => $request->get('startDate'),
            'end_date' => $request->get('endDate'),
            'subject_id' => $request->get('subject'),
            'teacher_id' => $t_id,
            'course_id' => $sub[0]->course_id,
            'semester_id' => $sub[0]->semester_id,
        ]);
        $assign->save();
        return redirect()->route('upload_assignments')->with('message', 'New Assignment uploaded successfully !!');

    }
    function view_assignments(Request $request, $id=0)
    {
        $st_id = $request->session()->get('student_id');
        if($st_id)
        {
            $student = Student::where('st_id', $st_id)->get();
            $subjects = Subject::where([
                'course_id' => $student[0]->course_id,
                'semester_id' => $student[0]->semester_id
                ])->get();

            $all_sub = array();
            $total_assign = array();
    
            foreach( $subjects as $sub ) {
                array_push($all_sub, $sub->sub_name);
                $assigns = Assignment::where('subject_id',$sub->sub_id)->get()->count();
                array_push($total_assign, $assigns);
                    
            }

            if($id != 0)
            {
                 $assignments = Assignment::where([
                     'assignments.course_id' => $student[0]->course_id,
                     'assignments.semester_id' => $student[0]->semester_id,
                     'assignments.subject_id' => $id
                     ])->join('subjects', 'subjects.sub_id', '=', 'assignments.subject_id')->get();
                
                return view('view_assignments',['subjects'=>$subjects, 'assignments'=> $assignments,'all_sub'=>$all_sub,'assigns'=>$total_assign]);
            }
            else
            {
                $assignments = Assignment::where([
                    'assignments.course_id' => $student[0]->course_id,
                    'assignments.semester_id' => $student[0]->semester_id
                    ])->join('subjects', 'subjects.sub_id', '=', 'assignments.subject_id')->get();
                
                return view('view_assignments',['subjects'=>$subjects, 'assignments'=>$assignments,'all_sub'=>$all_sub,'assigns'=>$total_assign]);

            }  
        }
        else
            return redirect('student_login'); 
    }

    function upload_solutions(Request $request, $sub_id = 0, $assign_id = 0)
    {
        $st_id = $request->session()->get('student_id');
        if($st_id)
        {
            $student = Student::where('st_id', $st_id)->get();
            $subjects = Subject::where([
                'course_id' => $student[0]->course_id,
                'semester_id' => $student[0]->semester_id
                ])->get();

            $solu_ids = array();
            $solu_status_ids = array();
            $student_solutions = Solution::where('student_id', $st_id)->get();
            foreach( $student_solutions as $solu ) {
                array_push($solu_ids, $solu->que_ass_id);
                if($solu->status == TRUE)
                {
                    array_push($solu_status_ids, $solu->que_ass_id);
                }
            }
            
            if($assign_id != 0)
            {
                $request->session()->put('que_ass_id',$assign_id);
                $assign_obj = Assignment::where('as_id', $assign_id)->get();
                 $assignments = Assignment::where([
                     'assignments.course_id' => $student[0]->course_id,
                     'assignments.semester_id' => $student[0]->semester_id,
                     'assignments.subject_id' => $sub_id
                     ])->join('subjects', 'subjects.sub_id', '=', 'assignments.subject_id')->get();
                
                return view('upload_solutions',['subjects'=>$subjects, 'assignments'=> $assignments, 'assign_id'=>$assign_obj, 'solu_ids'=>$solu_ids, 'solu_status' => $solu_status_ids]);
            }
            
            elseif($sub_id != 0)
            {
                 $assignments = Assignment::where([
                     'assignments.course_id' => $student[0]->course_id,
                     'assignments.semester_id' => $student[0]->semester_id,
                     'assignments.subject_id' => $sub_id
                     ])->join('subjects', 'subjects.sub_id', '=', 'assignments.subject_id')->get();
                
                return view('upload_solutions',['subjects'=>$subjects, 'assignments'=> $assignments, 'assign_id'=>$assign_id, 'solu_ids'=>$solu_ids, 'solu_status' => $solu_status_ids]);
            }
            else
            {
                $assignments = Assignment::where([
                    'assignments.course_id' => $student[0]->course_id,
                    'assignments.semester_id' => $student[0]->semester_id
                    ])->join('subjects', 'subjects.sub_id', '=', 'assignments.subject_id')->get();

                return view('upload_solutions',['subjects'=>$subjects, 'assignments'=>$assignments, 'assign_id'=>$assign_id, 'solu_ids'=>$solu_ids, 'solu_status' => $solu_status_ids]);

            } 
        }
        else
            return redirect('student_login'); 
        
    }

    function post_upload_solutions(Request $request, $sub_id = 0, $assign_id = 0)
    {
        $st_id = $request->session()->get('student_id');
        if($st_id)
        {
            date_default_timezone_set('Asia/Kolkata');
            $now = new DateTime();
            $submit_date = $now->format('Y-m-d H:i:s');
            $que_ass_id = $request->session()->get('que_ass_id');
            $que_ass = Assignment::where('as_id', $que_ass_id)->get();
            $student = Student::where('st_id', $st_id)->get();
            
            $file = $request->file('file_url');
            $filename = $file->getClientOriginalName();
            $file->move('upload', $filename);

            $solu = new Solution([
                'student_id' => $st_id,
                'subject_id' => $que_ass[0]->subject_id,
                'que_ass_id' => $que_ass_id,
                'ans_url' => $filename,
                'submit_date' => $submit_date,
                
            ]);
            $solu->save();

            return redirect()->route('upload_solutions',['sub_id'=> $que_ass[0]->subject_id])->with('message', 'Solution for '.$que_ass[0]->title.' uploaded successfully !!');
            
        }
        else
            return redirect('student_login'); 
        
    }

    //view solutions teacher side
    function view_solutions(Request $request, $subject_id=0, $as_id = 0)
    {
        $t_id = $request->session()->get('teacher_id');
        if($t_id)
        {
            $teacher = Teacher::where('t_id', $t_id)->get();
            $subjects = Subject::where('assign_teacher_id', $t_id)->get();

            $assigns = NULL;
            $sub_id = $request->get('subject');
            if ($sub_id)
                $assigns = Assignment::where('subject_id', $sub_id)->get();
            else
                $assigns = Assignment::where('subject_id', $subject_id)->get();

            $solutions = NULL;
            $assign_obj = NULL;
            if($as_id != 0)
            {
                $assign_obj = Assignment::where('as_id', $as_id)->get();
                $solutions = Solution::where([
                    'solutions.que_ass_id'=> $as_id,
                    ])->join('students', 'students.st_id', '=', 'solutions.student_id')
                    ->join('assignments', 'assignments.as_id', '=', 'solutions.que_ass_id')->get();

            }
            $solu_id = $request->get('solu_id');
            $marks = $request->get('marks');
            if ($marks)
            {
                $solution = Solution::where('sol_id',$solu_id)->get();
                $solution[0]->marks = $marks;
                $solution[0]->status = TRUE;
                $solution[0]->save();

                return redirect()->route('view_solutions',['subject_id'=> $solutions[0]->subject_id, 'as_id'=>$solutions[0]->que_ass_id]);
            }
        
            return view('teacher/view_solutions',['subjects'=>$subjects, 'assigns'=>$assigns,'solutions'=>$solutions,'assign_obj'=>$assign_obj]); 
        }
        else
            return redirect('teacher_login'); 
    }

    function reject_solution(Request $request, $solution_id=0)
    {
        $t_id = $request->session()->get('teacher_id');
        if($t_id)
        {
            $teacher = Teacher::where('t_id', $t_id)->get();
            $solution = Solution::where('sol_id',$solution_id)->get();
            return view('teacher/reject_solution',['solution'=>$solution]); 
        }
        else
            return redirect('teacher_login'); 
    }
    function post_reject_solution(Request $request, $solution_id=0)
    {
        $t_id = $request->session()->get('teacher_id');
        if($t_id)
        {
            $solu_id = $request->get('solu_id');
            $message = $request->get('message');
            $solution = Solution::find($solu_id);
            $solution2 = Solution::where('solutions.sol_id',$solu_id)->join('students', 'students.st_id', '=', 'solutions.student_id')->get();
            $sub_id = $solution->subject_id;
            $as_id = $solution->que_ass_id;
            $solution->delete();
            return redirect()->route('view_solutions',['subject_id'=> $sub_id, 'as_id'=>$as_id])->with('message', 'Solution of '.$solution2[0]->first_name.' '.$solution2[0]->last_name.' rejected successfully !!'); 
        }
        else
            return redirect('teacher_login'); 
    }
    
    function student_report(Request $request)
    {
        $t_id = $request->session()->get('teacher_id');
        if($t_id)
        {
            $student = array();
            $reports = array();
            $js_report = array();
            $completed = array();
            $uploaded = array();
            $remaining = array();
            $marks = array();
            $assigns = array();
            $total_marks_report= array();
            $teacher = Teacher::where('t_id', $t_id)->get();
            $subjects = Subject::where('assign_teacher_id', $t_id)->get();
            
            return view('teacher/student_report',['subjects'=>$subjects,'student'=>$student,'js_report'=>$js_report,'marks'=>$marks,'assigns'=>$assigns,'total_marks_report'=>$total_marks_report]);
        }
        else
            return redirect('teacher_login');
        
    }
    function post_student_report(Request $request)
    {
        $t_id = $request->session()->get('teacher_id');
        if($t_id)
        {
            $teacher = Teacher::where('t_id', $t_id)->get();
            $subjects = Subject::where('assign_teacher_id', $t_id)->get();
            $sub_id = $request->get('subject');
            $roll_no = $request->get('rollno');
            
            $msg = NULL;
            $student = array();
            $reports = array();
            $js_report = array();
            $completed = array();
            $uploaded = array();
            $remaining = array();
            $marks = array();
            $assigns = array();
            $total_marks_report= array();

            $student = Student::where('roll_no',$roll_no)
            ->join('courses', 'courses.c_id', '=', 'students.course_id')
            ->join('semesters', 'semesters.sem_id', '=', 'students.semester_id')->get();
            $subject = Subject::where('sub_id', $sub_id)->get();
            $total_assigns = Assignment::where('subject_id',$sub_id)->get();
            $completed = Solution::where([
                'subject_id'=> $sub_id,
                'student_id'=> $student[0]->st_id,
                'status'=> TRUE
                ])->get();
            $uploaded = Solution::where([
                'subject_id'=> $sub_id,
                'student_id'=> $student[0]->st_id,
                'status'=> FALSE
                ])->get();
            $remaining_count = $total_assigns->count() - ($completed->count() + $uploaded->count());
            array_push($reports, $total_assigns->count());
            array_push($reports, $completed->count());
            array_push($js_report, $completed->count());
            array_push($reports, $uploaded->count());
            array_push($js_report, $uploaded->count());
            array_push($reports, $remaining_count);
            array_push($js_report, $remaining_count);

            $st_solutions = Solution::where([
                'solutions.subject_id'=> $sub_id,
                'solutions.student_id'=> $student[0]->st_id
                ])
                ->join('assignments', 'assignments.as_id', '=', 'solutions.que_ass_id')->get();
            foreach ($st_solutions as $sol)
            {
                array_push($marks, $sol->marks);
                array_push($assigns, $sol->title);
            }

            $total_marks = 0;
            $received_marks = 0;
            foreach ($total_assigns as $as)
            {
                $total_marks += $as->points;
            }
            foreach ($completed as $as)
            {
                $received_marks += $as->marks;
            }
            array_push($total_marks_report, $total_marks);
            array_push($total_marks_report, $received_marks);

            return view('teacher/student_report',['subjects'=>$subjects, 'student'=>$student,'reports'=>$reports,'js_report'=>$js_report,'marks'=>$marks,'assigns'=>$assigns,'total_marks_report'=>$total_marks_report]);
        }
        else
            return redirect('teacher_login');
        
    }
}
