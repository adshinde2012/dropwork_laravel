<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $primaryKey = 'sol_id';
    protected $fillable = ['student_id','subject_id','que_ass_id','ans_url','submit_date','marks','status'];
    public $timestamps = false;
}
