<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Allotment extends Model
{

    protected $fillable = ['course_id'];
    protected $table = 'allotments';
    public function course($id){ 
       return Course::all()->where('id', $id);
         
    }
}
