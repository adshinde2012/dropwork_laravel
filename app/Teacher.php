<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
   // protected $guarded = [];
    protected $table = 'teachers';
    protected $fillable = ['first_name','last_name','email','password'];
    public $timestamps = false;
}
