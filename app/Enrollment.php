<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Enrollment extends Model
{

    protected $fillable = ['course_id'];
    protected $table = 'course_enrollment';
    public function course($id){ 
       return Course::all()->where('id', $id);
         
    }
}
