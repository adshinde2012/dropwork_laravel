<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Subject;
use App\Assignment;
use App\Student;
use App\Solution;
use App\Course;
use App\Semester;
use App\Admin;
use DB;
use \Datetime;

class AdminController extends Controller
{
    function admin_login(Request $request)
    {
        return view('admin/admin_login');
        
    }
    function post_admin_login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('pass');
        $admin = Admin::where('email', $email)->get();
        $error_msg = null;
        if ($admin->count() > 0)
        {
            if($admin[0]->password == $password)
            {
                //Session::put('student_id', $student[0]->id);
                //session(['key' => 'value']);
                $request->session()->put('admin_id',$admin[0]->ad_id);
                return redirect('admin_dashboard');
            }
            else
            {
                $error_msg = "Invalid Email or Password !!";
                return view('admin/admin_login',['error'=>$error_msg]);
            }
        }
        else
        {
            $error_msg = "Invalid Email or Password !!";
            return view('admin/admin_login',['error'=>$error_msg]);
        }
        return view('admin/admin_login');
        
    }
    function admin_dashboard(Request $request)
    {
        $ad_id = $request->session()->get('admin_id');
        $admin = Admin::where('ad_id', $ad_id)->get();
        $students = Student::all()->count();
        $courses = Course::all()->count();
        $teachers = Teacher::all()->count();
        $assignments = Assignment::all()->count();

        $all_students = Student::all();
        if(!empty($ad_id)){
            return view('admin/admin_dashboard',['admin'=>$admin,"all_students"=>$all_students,'students'=>$students,'teachers'=>$teachers,'courses'=>$courses,'assignments'=>$assignments]);
        }
        else
            return redirect('admin_login');
        
    }
    function manage_courses(Request $request, $course_id=0 ,$del_course_id=0 )
    {
        if ($course_id != 0 ){
            $course_obj = Course::find($course_id);
        }
        else{
            $course_obj = [];
        }
        
        if ($del_course_id != 0){
            $course = Course::find($del_course_id)->delete();
            return redirect()->route('manage_courses');
        }
        $courses = Course::all();
        $ad_id = $request->session()->get('admin_id');
        $admin = Admin::where('ad_id', $ad_id)->get();
        return view('admin/manage_courses',['admin'=>$admin, 'courses'=>$courses, 'course_obj'=>$course_obj]);
    }
    function post_manage_courses(Request $request)
    {
        $course_name = $request->get('course_name');
        if ($course_name){
            $course = new Course([
                'name' => $course_name,
            ]);
            $course->save();
        }
        $course_id = $request->get('course_id');
        if ($course_id){
            $course_name = $request->get('new_course_name');
            $course = Course::where('c_id',$course_id)->get();
                $course[0]->name = $course_name;
                $course[0]->save();
        }
        return redirect('manage_courses');
        
    }
    function manage_semesters(Request $request, $sem_id=0 ,$del_sem_id=0)
    {
        if ($sem_id != 0 ){
            $sem_obj = Semester::find($sem_id);
        }
        else{
            $sem_obj = [];
        }
        
        if ($del_sem_id != 0){
            $sem = Semester::find($del_sem_id)->delete();
            return redirect()->route('manage_semesters');
        }
        $semesters = Semester::all();
        $ad_id = $request->session()->get('admin_id');
        $admin = Admin::where('ad_id', $ad_id)->get();
        return view('admin/manage_semesters',['admin'=>$admin, 'semesters'=>$semesters, 'sem_obj'=>$sem_obj]);
        
    }
    function post_manage_semesters(Request $request)
    {
        $sem = $request->get('sem');
        if ($sem){
            $semester = new Semester([
                'sems' => $sem,
            ]);
            $semester->save();
        }
        $sem_id = $request->get('sem_id');
        if ($sem_id){
            $new_sem = $request->get('new_sem');
            $semester = Semester::where('sem_id',$sem_id)->get();
                $semester[0]->sems = $new_sem;
                $semester[0]->save();
        }
        return redirect('manage_semesters');
        
    }

    function manage_subjects(Request $request, $sub_id=0 ,$del_sub_id=0)
    {
        if ($sub_id != 0 ){
            $sub_obj = Subject::where('sub_id', $sub_id)
            ->join('courses', 'courses.c_id', '=', 'subjects.course_id')
            ->join('semesters', 'semesters.sem_id', '=', 'subjects.semester_id')
            ->join('teachers', 'teachers.t_id', '=', 'subjects.assign_teacher_id')->get();
        }
        else{
            $sub_obj = [];
        }
        
        if ($del_sub_id != 0){
            $sub = Subject::find($del_sub_id)->delete();
            return redirect()->route('manage_subjects');
        }
        $ad_id = $request->session()->get('admin_id');
        $admin = Admin::where('ad_id', $ad_id)->get();
        $subjects = DB::table('subjects')
        ->join('courses', 'courses.c_id', '=', 'subjects.course_id')
        ->join('semesters', 'semesters.sem_id', '=', 'subjects.semester_id')
        ->join('teachers', 'teachers.t_id', '=', 'subjects.assign_teacher_id')->get();
        $courses = Course::all();
        $sems = Semester::all();
        $teachers = Teacher::all();
        return view('admin/manage_subjects',['admin'=>$admin, 'subjects'=>$subjects, 'courses'=>$courses, 'sems'=>$sems,'teachers'=>$teachers, 'sub_obj'=>$sub_obj]);
        
    }
    function post_manage_subjects(Request $request)
    {
        $sub_name = $request->get('sub_name');
        $credit = $request->get('credit');
        $course = $request->get('course');
        $sem = $request->get('sem');
        $assign_teacher = $request->get('assign_teacher');
        if ($sub_name){
            $subject = new Subject([
                'sub_name' => $sub_name,
                'credit' => $credit,
                'course_id' => $course,
                'semester_id' => $sem,
                'assign_teacher_id' => $assign_teacher,
            ]);
            $subject->save();
        }
        $sub_id = $request->get('sub_id');
        if ($sub_id){
            $sub_name = $request->get('new_sub_name');
            $credit = $request->get('new_credit');
            $course = $request->get('new_course');
            $sem = $request->get('new_sem');
            $assign_teacher = $request->get('new_assign_teacher');
            error_log($sub_name);
            $subject = Subject::where('sub_id',$sub_id)->get();
                $subject[0]->sub_name = $sub_name;
                $subject[0]->credit = $credit;
                $subject[0]->course_id = $course;
                $subject[0]->semester_id = $sem;
                $subject[0]->assign_teacher_id = $assign_teacher;
                $subject[0]->save();
        }
        return redirect('manage_subjects');
        
    }
    function admin_logout(Request $request)
    {
        $request->session()->forget('admin_id');
        return redirect('admin_login');
    }

    function manage_teachers(Request $request)
    {

        // if ($del_sub_id != 0){
        //     $sub = Subject::find($del_sub_id)->delete();
        //     return redirect()->route('manage_subjects');
        // }
        $ad_id = $request->session()->get('admin_id');
        $admin = Admin::where('ad_id', $ad_id)->get();
    
        $teachers = Teacher::all();
        return view('admin/manage_teachers',['admin'=>$admin, 'teachers'=>$teachers]);
        
    }
    function manage_students(Request $request)
    {

        $ad_id = $request->session()->get('admin_id');
        $admin = Admin::where('ad_id', $ad_id)->get();
    
        $students = Student::all();
        return view('admin/manage_students',['admin'=>$admin, 'students'=>$students]);
        
    }
    function admin_assignments(Request $request)
    {

        $ad_id = $request->session()->get('admin_id');
        $admin = Admin::where('ad_id', $ad_id)->get();
    
        $assignments = DB::table('assignments')
        ->join('subjects', 'subjects.sub_id', '=', 'assignments.subject_id')
        ->join('teachers', 'teachers.t_id', '=', 'assignments.teacher_id')
        ->join('courses', 'courses.c_id', '=', 'assignments.course_id')
        ->join('semesters', 'semesters.sem_id', '=', 'assignments.semester_id')->get();
        return view('admin/assignments',['admin'=>$admin, 'assignments'=>$assignments]);
        
    }
    function admin_solutions(Request $request)
    {

        $ad_id = $request->session()->get('admin_id');
        $admin = Admin::where('ad_id', $ad_id)->get();
    
        $solutions = Solution::all();
        return view('admin/solutions',['admin'=>$admin, 'solutions'=>$solutions]);
        
    }
}
