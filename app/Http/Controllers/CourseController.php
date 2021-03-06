<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Course;
use App\Degree;
use App\Allotment;
use Illuminate\Http\Request;
use App\Comment; 


use DB;
class CourseController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {


        $data['courses'] = Course::all();
        return view('quiz.admin.course.index', $data);
    }
   
    public function courses(Request $request) {
    $date['courses'] = DB::table('allotments')
                ->join('courses', 'courses.id', '=', 'allotments.course_id')
                ->where('allotments.user_id',$request->id)
                ->select('courses.*')
                ->distinct()
                ->get();

        return view('quiz.index', $date);}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $date['roles'] = Role::all();
        $date['degrees'] = Degree::all();
        return view("quiz.admin.course.create", $date);
    }
 public function dcreate() {
     
        $date['roles'] = Role::all();
        return view("quiz.admin.course.DegreeCreate", $date);
    }
    public function enrollment($id) {
        $course = Course::findOrFail($id);
        $date['course'] = $course;
        $date['teachers'] = User::where('is_active', 1)->where('role_id', 2)->where('degree', $course->degree_id)->get();
        $date['students'] = User::where('is_active', 1)
                        ->where('role_id', 3)->where('degree', $course->degree_id)->get();
        return view("quiz.admin.course.enrollment", $date);
    }

    public function enrollmentadd(Request $request) {
        if (isset($request->teacher)) {
            $enrollment = new Allotment();
            $enrollment->course_id = $request->id;
            $enrollment->user_id = $request->teacher;
            $enrollment->save();
        }
        if (!is_array($request->student))
            $student[0] = $request->student;
        else {
            $student = $request->student;
        }
        foreach ($student as $std) {
            $enrollment = new Allotment();
            $enrollment->course_id = $request->id;
            $enrollment->user_id = $std;
            $enrollment->save();
        }
        session()->flash('success', 'User Added in Course Successfully');
        $course = Course::findOrFail($request->id);
        $date['course'] = $course;
        $date['teachers'] = User::where('is_active', 1)->where('role_id', 2)->where('degree', $course->degree_id)->get();
        $date['students'] = User::where('is_active', 1)
                        ->where('role_id', 3)->where('degree', $course->degree_id)->get();
        return view("quiz.admin.course.enrollment", $date);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate(request(), [
            'code' => 'required',
            'title' => 'required',
            'degree' => 'required',
        ]);
      try{
        $course = new Course();
        $course->code = $request->code;
        $course->title = $request->title;
        $course->degree_id = $request->degree;
        $course->save();
      }catch(\Exception $e){
        $date['roles'] = Role::all();
        $date['degrees'] = Degree::all();
                session()->flash('error', 'Course Already Added before.please try again...');

        return view("quiz.admin.course.create", $date);
    }
            session()->flash('success', 'Course Created Successfully');

        return redirect()->route('course.all');
    }
      public function dstore(Request $request) {

        $this->validate(request(), [
            'name' => 'required',
        ]);
       
        try{
        $course = new Degree();
        $course->name = $request->name;
        $course->save();
        
         }catch(\Exception $e){
       
                session()->flash('error', 'Degree Already Added before.please try again...');
        $date['roles'] = Role::all();
        return view("quiz.admin.course.DegreeCreate", $date);
        
        
    }
       
        
        session()->flash('success', 'Degree Created Successfully');
        return redirect()->route('course.all');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

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
    public function update(Request $request, $id) {
        $this->validate(request(), [
//             'code' => 'required',
            'title' => 'required',
            'degree' => 'required',
        ]);
        $course = Course::findOrFail($id);
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
    public function destroy($id) {
        $course = Course::findOrFail($id);
        $course->delete();
        session()->flash('success', 'Course Deleted Successfully');
        return redirect()->route('course.all');
    }

}
