<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'admins';
    protected $fillable = ['first_name','last_name','email','password'];
    public $timestamps = false;
}
