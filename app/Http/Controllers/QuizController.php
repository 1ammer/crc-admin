<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Course;
use App\Quiz;
use App\Question;
use App\FinalQuiz;
use App\Result;
use App\Degree;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Allotment;
use Illuminate\Http\Request;

class QuizController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {


        $data['quizzes'] = DB::table('quizzes')
                ->join('courses', 'courses.id', '=', 'quizzes.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('quizzes.*', 'courses.title as title')
                ->distinct()
                ->get();
        return view('quiz.teacher.quiz.index', $data);
    }

    public function sQuizAll() {
        $data['quizzes'] = DB::table('quizzes')
                ->join('courses', 'courses.id', '=', 'quizzes.course_id')
                ->join('final_quiz', 'quizzes.id', '=', 'final_quiz.quiz_id')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('allotments.user_id', Auth::user()->id)
                ->select('quizzes.*', 'courses.title as title', 'final_quiz.numberofquestion as total')
                ->distinct()
                ->get();
        return view('quiz.student.quiz_index', $data);
    }

    public function quiz_submit(Request $request) {
        $result = 0;
        $finalQuiz = FinalQuiz:: where('quiz_id', $request['quizid'])
                ->first();
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'q_') !== false) {
                $ques = explode('q_', $key);
                if ($this->checkAnswer($ques[1], $value))
                    $result = $result + $finalQuiz->marks;
            }
        }
        $Result = new Result();
        $Result->user_id = Auth::user()->id;
        $Result->quiz_id = $request['quizid'];
        $Result->obtained = $result;
        $Result->total = $finalQuiz->marks * $finalQuiz->numberofquestion;
        $Result->save();
        session()->flash('success', 'Quiz submited Successfully');

        return redirect()->route('squiz.all');
    }

    public function checkAnswer($que, $ans) {
        $Question = Question::find($que);
        if ($Question->answer == $ans)
            return 1;
        return 0;
    }

    public function sQuizstart(Request $request) {

        $date['result'] = Result::where('quiz_id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->first();
        if (isset($date['result']->id)) {
            session()->flash('success', 'Quiz Already Submited before');

            return redirect()->route('squiz.all');
        }
         $Quiz = Quiz::where('id',$request->id)->first(); 
 
 $date['time'] = $Quiz->time;
 $FinalQuiz = FinalQuiz::where('quiz_id',$request->id)->first(); 
 if( $FinalQuiz->difficulty=='R'){
      $date['questions'] = DB::table('questions')
               ->join('final_quiz', 'questions.quiz_id', '=', 'final_quiz.quiz_id')
                ->where('questions.quiz_id', $request->id)
                                 ->select('*','questions.id as id', 'final_quiz.numberofquestion as total')
                ->distinct('id')
                ->limit(FinalQuiz:: where('quiz_id', $request->id)->select('numberofquestion')->first()->numberofquestion)
                ->get();
 } else
        $date['questions'] = DB::table('questions')
                ->join("final_quiz", function($join) {
                    $join->on('questions.difficulty', '=', 'final_quiz.difficulty')
                    ->on('questions.quiz_id', '=', 'final_quiz.quiz_id');
                })
                ->where('questions.quiz_id', $request->id)
                ->select('*','questions.id as id', 'final_quiz.numberofquestion as total')
                ->distinct('id')
                ->limit(FinalQuiz:: where('quiz_id', $request->id)->select('numberofquestion')->first()->numberofquestion)
                ->get();
                
        return view("quiz.student.start", $date);
    }

    public function getgenerate(Request $request) {
        $date['questions'] = DB::table('questions')
                ->select('*')
                ->selectRaw(DB::raw("COUNT(difficulty) as cDiff"))
                ->where('quiz_id', $request->id)
                ->groupBy('difficulty')
                ->orderBy('difficulty', 'DESC')
                ->get();
    $date['total'] =DB::table('questions')
                ->select('*')
                ->where('quiz_id', $request->id)
                ->count(); 
          $Question = Quiz::find($request->id);
         $date['time'] =( $Question->time);
        $date['cDiff'][0] = DB::table('questions')
                ->select('*')
                ->where('difficulty','N')
                ->where('quiz_id', $request->id)
                ->count();
  $date['cDiff'][1] = DB::table('questions')
                ->select('*')
                ->where('difficulty', 'M')
                ->where('quiz_id', $request->id)
                ->count(); 
  $date['cDiff'][2] = DB::table('questions')
                ->select('*')
                ->where('difficulty', 'H')
                ->where('quiz_id', $request->id)
                ->count();
   
        return view("quiz.teacher.quiz.generate", $date);
    }

    public function qAdd(Request $request) {
        $date['id'] = $request->id;
        return view("quiz.teacher.quiz.question_add", $date);
    }

    public function store(Request $request) {

        $this->validate(request(), [
            'course' => 'required',
            'title' => 'required',
            'diff' => 'required',
             'time' => 'required',
        ]);
        $quiz = new Quiz();
        $quiz->user_id = Auth::user()->id;
        $quiz->course_id = $request->course;
        $quiz->name = $request->title;
        $quiz->difficulty = $request->diff;
         $quiz->time = $request->time;
        $quiz->save();
        session()->flash('success', 'Quiz Created Successfully');

        return redirect()->route('quiz.all');
    }

    public function qstore(Request $request) {

        $this->validate(request(), [
            'question' => 'required',
            'op1' => 'required',
            'op2' => 'required',
            'op3' => 'required',
            'op4' => 'required',
            'ans' => 'required',
            'diff' => 'required',
            'id' => 'required',
        ]);
        $question = new Question();
        $question->description = $request->question;
        $question->option_a = $request->op1;
        $question->option_b = $request->op2;
        $question->option_c = $request->op3;
        $question->option_d = $request->op4;
        $question->quiz_id = $request->id;
        $question->answer = $request->ans;
        $question->difficulty = $request->diff;
        $question->save();
        session()->flash('success', 'Queation Added Successfully');

        return redirect()->route('quiz.add', $request->id);
    }

    public function create() {
        $date['courses'] = DB::table('courses')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('courses.*')
                ->distinct()
                ->get();
        return view("quiz.teacher.quiz.create", $date);
    }

    public function generate(Request $request) {

        $this->validate(request(), [
            'count' => 'required',
            'diff' => 'required',
            'date' => 'required',
            'marks' => 'required',
            'id' => 'required',
        ]);
        $finalQuiz = new FinalQuiz();
        $finalQuiz->quiz_id = $request->id;
        $finalQuiz->marks = $request->marks;
        $finalQuiz->difficulty = $request->diff;
        $finalQuiz->numberofquestion = $request->count;
        $finalQuiz->quizdate = $request->date;
        $finalQuiz->save();
        session()->flash('success', 'Quiz Generated Successfully');

        return redirect()->route('quiz.all');
    }

    public function destroy($id) {
        $course = Quiz::findOrFail($id);
        $course->delete();
        session()->flash('success', 'Course Deleted Successfully');
        return redirect()->route('quiz.all');
    }

    public function result() {
        $data['qresult'] = DB::table('results')
                ->join('quizzes', 'quizzes.id', '=', 'results.quiz_id')
                ->where('results.user_id', Auth::user()->id)
                ->select('results.*'
                        , 'quizzes.name as qtitle')
                ->distinct()
                ->get();
        $data['aresult'] = DB::table('results')
                ->join('assignments', 'assignments.id', '=', 'results.ass_id')
                ->where('results.user_id', Auth::user()->id)
                ->select('results.*'
                        , 'assignments.name as atitle'
                )
                ->distinct()
                ->get();
        return view('quiz.student.result_index', $data);
    }
    public function tresult() {
          $date['courses'] = DB::table('allotments')
                ->join('courses', 'courses.id', '=', 'allotments.course_id')
                ->where('allotments.user_id', Auth::user()->id)
                ->select('courses.*')
                ->distinct()
                ->get();
        foreach ( $date['courses'] as $key  ) {
                    $data['qresult'][]= DB::table('results')
                ->join('quizzes', 'quizzes.id', '=', 'results.quiz_id')
                ->join('users', 'users.id', '=', 'results.user_id')
               ->join('courses', 'quizzes.course_id', '=', 'courses.id')
                ->where('quizzes.course_id',$key->id)
                ->where('quizzes.user_id', Auth::user()->id)
                               ->select('*','quizzes.name as name','users.name as uname','courses.title as ctitle')

                ->distinct()
               ->orderBy("courses.id", 'asc')
                ->get();
                     $data['courseTitle'][]=$key->title;
         } 
        
        return view('quiz.teacher.result_index', $data);
    }

}
