<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';   
    protected $primaryKey = 'c_id';
    public $timestamps = false;
    protected $fillable = ['name',];
}
