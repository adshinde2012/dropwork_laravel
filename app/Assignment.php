<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['title','description','file_url','points','subject_id','teacher_id','start_date','end_date','course_id','semester_id'];
    public $timestamps = false;
}
