<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Allotment;
use App\Course; 
use App\Comment; 


use DB;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('dashboard.admin');
        } elseif (Auth::user()->isTeacher()) {
            return redirect()->route('dashboard.teacher');
        } elseif (Auth::user()->isStudent()) {
            return redirect()->route('dashboard.student');
        }
        return view('home');
    }

    public function adminHome() {

        return view('quiz.admin.index');
    }

    public function studentHome() {
        $date['courses'] = DB::table('allotments')
                ->join('courses', 'courses.id', '=', 'allotments.course_id')
                ->where('allotments.user_id', Auth::user()->id)
                ->select('courses.*')
                ->distinct()
                ->get();

        return view('quiz.student.index', $date);
    }

    public function teacherHome() {
        $date['courses'] = DB::table('allotments')
                ->join('courses', 'courses.id', '=', 'allotments.course_id')
                ->where('allotments.user_id', Auth::user()->id)
                ->select('courses.*')
                ->distinct()
                ->get();
        return view('quiz.teacher.index', $date);
    }

    
    
    public function comments(Request $request) {

        $this->validate(request(), [
            'message' => 'required',
            'type' => 'required',
            'id' => 'required',
        ]);
        $Comment = new Comment();
        $Comment->message = $request->message;
        $Comment->type = $request->type;
        $Comment->userName =  Auth::user()->name;
         $Comment->userId = Auth::user()->id;
        $Comment->save();
        session()->flash('success', 'Comments Added Successfully');
        return redirect()->back()->withInput();
    }

}
