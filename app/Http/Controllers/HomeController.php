<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enrollment;
use App\Course; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('dashboard.admin');
        } elseif (Auth::user()->isTeacher()) {
            return redirect()->route('dashboard.teacher');
        } elseif (Auth::user()->isStudent()) {
            return redirect()->route('dashboard.student');
        }
        return view('home');
    }

    public function adminHome()
    {

        return view('quiz.admin.index');
    }

    public function studentHome()
    {  
         
        $date['Enrollment']=Enrollment::all()->where('user_id', Auth::user()->id);
        foreach ($date['Enrollment'] as $Enrollment)
             $date['courses'][]= Course::find( $Enrollment->course_id)   ; 
                 
        return view('quiz.student.index',$date);
    }

    public function teacherHome()
    {
 $date['Enrollment']=Enrollment::all()->where('user_id', Auth::user()->id);
        foreach ($date['Enrollment'] as $Enrollment)
             $date['courses'][]= Course::find( $Enrollment->course_id)   ; 
                 
        return view('quiz.teacher.index',$date);
        
    }
}
