<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';   
    public $timestamps = false; 
    protected $primaryKey = 'sem_id';
    protected $fillable = ['sems',];
}
