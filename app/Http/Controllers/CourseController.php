<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Course;
use App\Degree;
use App\Enrollment;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         
        $data['courses']=Course::all();
        return view('quiz.admin.course.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date['roles'] = Role::all();
         $date['degrees'] = Degree::all();
        return view("quiz.admin.course.create",$date);

    }
     public function enrollment($id)
    {
        $course  = Course::findOrFail($id);
          $date['course'] = $course;
         $date['teachers'] = User::where( 'is_active',1)->where( 'role_id',2)->where( 'degree',$course->degree_id)->get();
         $date['students'] =User::where( 'is_active',1)
                                ->where( 'role_id',3)->where( 'degree',$course->degree_id)->get();
        return view("quiz.admin.course.enrollment",$date);

    }
    public function enrollmentadd(Request $request)
    {
        if(isset($request->teacher)){
        $enrollment  = new Enrollment();
        $enrollment->course_id=$request->id;
        $enrollment->user_id=$request->teacher;
        $enrollment->save();
        }
        if(!is_array($request->student))
            $student[0]=$request->student;
        else {
            $student=$request->student;
        }
        foreach($student as $std){
        $enrollment  = new Enrollment();
        $enrollment->course_id=$request->id;
        $enrollment->user_id=$std;
        $enrollment->save();
        }
         session()->flash('success', 'User Added in Course Successfully');
         $course  = Course::findOrFail($request->id);
        $date['course'] = $course;
         $date['teachers'] = User::where( 'is_active',1)->where( 'role_id',2)->where( 'degree',$course->degree_id)->get();
         $date['students'] =User::where( 'is_active',1)
                                ->where( 'role_id',3)->where( 'degree',$course->degree_id)->get();
        return view("quiz.admin.course.enrollment",$date);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate(request(), [
            'code' => 'required',
            'title' => 'required',
            'degree' => 'required',
             
        ]);

        $course = new Course();
        $course->code = $request->code;
        $course->title = $request->title;
        $course->degree_id = $request->degree;
        $course->save();
        session()->flash('success', 'Course Created Successfully');

        return redirect()->route('course.all');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $date['course'] = Course::findOrFail($id);
        $date['degrees'] = Degree::all();
        return view('quiz.admin.course.edit', $date);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [ 
//             'code' => 'required',
            'title' => 'required',
            'degree' => 'required',
        ]);
        $course  = Course::findOrFail($id);
        $course->title = $request->title;
        $course->degree_id = $request->degree;
        $course->save();
        session()->flash('success', 'User Updated Successfully');
        return redirect()->route('course.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $course  = Course::findOrFail($id);
        $course->delete();
        session()->flash('success', 'Course Deleted Successfully');
        return redirect()->route('course.all');
    }
}
