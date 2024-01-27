<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'sub_id';
    protected $table = 'subjects'; 
    public $timestamps = false;
    protected $fillable = ['sub_name','credit','course_id','semester_id','assign_teacher_id'];
}
