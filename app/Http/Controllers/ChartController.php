<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;
use App\Quiz;
use DB;

class ChartController extends Controller
{
     public function index()
    {
    	$quizzes = \DB::table('final_quiz')->get();

    	$users = \DB::table('final_quiz')->join('quizzes', 'final_quiz.quiz_id', '=', 'quizzes.id')->join('users', 'quizzes.user_id', '=', 'users.id')->get();
    	
        $quizzeschart = Charts::database($quizzes, 'bar', 'highcharts')
			      ->title("Quizzes Marks")
			      ->elementLabel("Quizes")
			      ->labels($users->pluck('name'))
			      ->values($quizzes->pluck('marks'))
			      ->dimensions(1000, 500)
			      ->responsive(true);

        $courses = \DB::table('courses')->get();
    	
        $courseschart = Charts::database($courses, 'bar', 'highcharts')
			      ->title("Degree Courses")
			      ->elementLabel("Name of Courses")
			      ->labels($courses->pluck('title'))
			      ->values($courses->pluck('degree_id'))
			      ->dimensions(1000, 500)
			      ->responsive(true);



	    return view('quiz/admin/index',compact('quizzeschart', 'courseschart'));
    }
}
