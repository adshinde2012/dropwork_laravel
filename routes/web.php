<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'DropworkController@home');
Route::get('/register', 'DropworkController@register');
Route::post('/register', 'DropworkController@post_register');
Route::get('/student_login', 'DropworkController@student_login');
Route::post('/student_login', 'DropworkController@post_student_login');
Route::get('/student_dashboard', 'DropworkController@student_dashboard');
Route::get('/view_assignments', 'AssignmentController@view_assignments');
Route::get('/view_assignments/{id}', 'AssignmentController@view_assignments')->name('view_assignments');
Route::get('/upload_solutions', 'AssignmentController@upload_solutions');
Route::get('/upload_solutions/{sub_id}', 'AssignmentController@upload_solutions')->name('upload_solutions');
Route::get('/upload_solutions/{sub_id}/{assign_id}', 'AssignmentController@upload_solutions');
Route::post('/upload_solutions/{sub_id}/{assign_id}', 'AssignmentController@post_upload_solutions');
Route::get('/myscore', 'ScoreController@myscore');
Route::get('/subject_list', 'StudentController@subject_list');
Route::get('/my_classmates', 'StudentController@my_classmates');
Route::get('/todo_list', 'StudentController@todo_list');
Route::get('/student_logout', 'DropworkController@student_logout');
Route::get('/update_profile', 'StudentController@update_profile');
Route::post('/update_profile', 'StudentController@post_update_profile');

//teachers urls
Route::get('/teacher_login', 'DropworkController@teacher_login');
Route::post('/teacher_login', 'DropworkController@post_teacher_login');
Route::get('/teacher_registration', 'DropworkController@teacher_registration');
Route::post('/teacher_registration', 'DropworkController@post_teacher_registration');
Route::get('/teacher_dashboard', 'DropworkController@teacher_dashboard');
Route::get('/upload_assignments', 'AssignmentController@upload_assignments')->name('upload_assignments');
Route::post('/upload_assignments', 'AssignmentController@post_upload_assignments');
Route::get('/view_solutions', 'AssignmentController@view_solutions');
Route::post('/view_solutions', 'AssignmentController@post_view_solutions');
Route::get('/view_solutions/{subject_id}/{as_id}', 'AssignmentController@view_solutions')->name('view_solutions');
Route::get('/reject_solution/{solution_id}', 'AssignmentController@reject_solution')->name('reject_solution');
Route::post('/reject_solution/{solution_id}', 'AssignmentController@post_reject_solution');
Route::get('/my_subjects', 'TeacherController@my_subjects');
Route::get('/my_assignments', 'TeacherController@my_assignments')->name('my_assignments');
Route::get('/my_assignments/{assign_id}', 'TeacherController@my_assignments');
Route::get('/student_report', 'AssignmentController@student_report');
Route::post('/student_report', 'AssignmentController@post_student_report');
Route::get('/all_students', 'TeacherController@all_students');
Route::get('/teacher_logout', 'DropworkController@teacher_logout');

//admin urls
Route::get('/admin_login', 'AdminController@admin_login');
Route::post('/admin_login', 'AdminController@post_admin_login');
Route::get('/admin_logout', 'AdminController@admin_logout');
Route::get('/admin_dashboard', 'AdminController@admin_dashboard');
Route::get('/manage_courses', 'AdminController@manage_courses')->name('manage_courses');
Route::get('/manage_courses/{course_id}', 'AdminController@manage_courses');
Route::get('/manage_courses/{course_id}/{del_course_id}', 'AdminController@manage_courses');
Route::post('/manage_courses', 'AdminController@post_manage_courses');
Route::get('/manage_semesters', 'AdminController@manage_semesters')->name('manage_semesters');
Route::get('/manage_semesters/{sem_id}', 'AdminController@manage_semesters');
Route::get('/manage_semesters/{sem_id}/{del_sem_id}', 'AdminController@manage_semesters');
Route::post('/manage_semesters', 'AdminController@post_manage_semesters');
Route::get('/manage_subjects', 'AdminController@manage_subjects')->name('manage_subjects');
Route::get('/manage_subjects/{sub_id}', 'AdminController@manage_subjects');
Route::get('/manage_subjects/{sub_id}/{del_sub_id}', 'AdminController@manage_subjects');
Route::post('/manage_subjects', 'AdminController@post_manage_subjects');

Route::get('/manage_teachers', 'AdminController@manage_teachers')->name('manage_teachers');
Route::get('/manage_students', 'AdminController@manage_students')->name('manage_students');

Route::get('/assignments', 'AdminController@admin_assignments')->name('assignments');
Route::get('/solutions', 'AdminController@admin_solutions')->name('solutions');
