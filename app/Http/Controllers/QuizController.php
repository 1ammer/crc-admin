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
use DB,
    Session;
use Illuminate\Support\Facades\Auth;
use App\Allotment;
use Illuminate\Http\Request;

class QuizController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Startquiz() {
        $request = new Request();

        $quizzes = DB::table('quizzes')
                ->join('courses', 'courses.id', '=', 'quizzes.course_id')
                ->join('final_quiz', 'quizzes.id', '=', 'final_quiz.quiz_id')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('allotments.user_id', Auth::user()->id)
                ->select('quizzes.*', 'courses.title as title', 'final_quiz.numberofquestion as total')
                ->distinct()
                ->get();
        foreach($quizzes as $quiz){
           $flag= $this->sQuizcheck1($quiz->id);
            if(!$flag){
                $request->id=$quiz->id;
                return $this->sQuizstart($request);
        } }
        return 0;
        
        
    }
    public function index() {

        $data['quizzes'] = DB::table('quizzes')
                ->join('courses', 'courses.id', '=', 'quizzes.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('quizzes.*', 'courses.title as title')
                ->distinct()
                ->get();
        $data['comments'] = DB::table('comments')
                ->where('type', 'quiz')
                ->distinct()
                ->get();
        return view('quiz.teacher.quiz.index', $data);
    }

    public function bank(Request $request) { 
          $data['id'] =$request->id;
        $courseid=$this->getcourseidfromQ($request->id);
       $data['questions'] = Question::where('course_id',$courseid)
               ->where('quiz_id','!=',$request->id)
               ->groupBy('description')->get();
                return view('quiz.teacher.quiz.bank', $data);

    }
    public function addQbank(Request $request) { 
       
        if($request->question)
            foreach ($request->question as $qq)
        {            $questionNew=new Question();

            $questionOld=Question::find($qq);
             $questionNew->description=$questionOld->description;
          $questionNew->option_a =  $questionOld->option_a;
           $questionNew->option_b =$questionOld->option_b;
            $questionNew->option_c = $questionOld->option_c;
            $questionNew->option_d =            $questionOld->option_d;
            $questionNew->quiz_id  =         $request->id;
            $questionNew->answer    =        $questionOld->answer;
            $questionNew->difficulty  =          $questionOld->difficulty;
            $questionNew->course_id    =        $questionOld->course_id;
            $questionNew->created_at   =         $questionOld->created_at;
            $questionNew->updated_at    =        $questionOld->updated_at;
            $questionNew->save();
        }
        session()->flash('success', 'Question submited Successfully');
        return redirect()->route('quiz.all');
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
        $data['comments'] = DB::table('comments')
                ->where('type', 'quiz')
                ->distinct()
                ->get();
        
        return view('quiz.student.quiz_index', $data);
    }

    public function quiz_submit(Request $request) {
        $result = 0;
        $finalQuiz = FinalQuiz::where('quiz_id', $request['quizid'])
                ->first();
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'q_') !== false) {
                $ques = explode('q_', $key);
                if ($this->checkAnswer($ques[1], $value))
                    $result = $result + $finalQuiz->marks;
            }
        }
        $Quiz = Quiz::where('id', $request['quizid'])->first();
        $Result = new Result();
        $Result->user_id = Auth::user()->id;
        $Result->quiz_id = $request['quizid'];
        $Result->obtained = $result;
        $totall = $finalQuiz->marks * $finalQuiz->numberofquestion;
        $Result->total = $totall;
        $Result->save();

        $fResult = \App\FinalResult::where('user_id', Auth::user()->id)
                        ->where('course_id', $Quiz->course_id)->first();
        $quizmarks = ($result / $totall) * 15;
        if (!$fResult) {
            $fResult = new \App\FinalResult();
            $fResult->quiz_marks = $quizmarks;
        } else {
            $fResult->quiz_marks = ( ($quizmarks + $fResult->quiz_marks) / 2);
        }
        $fResult->course_id = $Quiz->course_id;
        $fResult->user_id = Auth::user()->id;
        $fResult->save();

        session()->flash('success', 'Quiz submited Successfully');
        return redirect()->route('squiz.all');
    }

    public function checkAnswer($que, $ans) {
        $Question = Question::find($que);
        if ($Question->answer == $ans)
            return 1;
        return 0;
    }
 public function getcourseidfromQ($que   ) {
        $Question = Quiz::find($que);
        return  $Question->course_id ;
            
    }
    public function sQuizstart(Request $request) {
 
        $date['result'] = Result::where('quiz_id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->first();
        if (isset($date['result']->id)) {
            session()->flash('success', 'Quiz Already Submited before');

            return redirect()->route('squiz.all');
        }
        $Quiz = Quiz::where('id', $request->id)->first();

        $date['time'] = $Quiz->time;
        $FinalQuiz = FinalQuiz::where('quiz_id', $request->id)->first();
        if ($FinalQuiz->difficulty == 'R') {
            $date['questions'] = DB::table('questions')
                    ->join('final_quiz', 'questions.quiz_id', '=', 'final_quiz.quiz_id')
                    ->where('questions.quiz_id', $request->id)
                    ->select('*', 'questions.id as id', 'final_quiz.numberofquestion as total')
                    ->distinct('id')
                    ->limit(FinalQuiz:: where('quiz_id', $request->id)->select('numberofquestion')->first()->numberofquestion)
                    ->inRandomOrder()
                    ->get();
        } else
            $date['questions'] = DB::table('questions')
                    ->join("final_quiz", function($join) {
                        $join->on('questions.difficulty', '=', 'final_quiz.difficulty')
                        ->on('questions.quiz_id', '=', 'final_quiz.quiz_id');
                    })
                    ->where('questions.quiz_id', $request->id)
                    ->select('*', 'questions.id as id', 'final_quiz.numberofquestion as total')
                    ->distinct('id')
                    ->limit(FinalQuiz:: where('quiz_id', $request->id)->select('numberofquestion')->first()->numberofquestion)
                    ->get();

        if (Session::has('ttime1' . $request->id)) {
            $tt = Session::get('ttime1' . $request->id);
            $dif = (int) ((time() - $tt) / 60);
            if ($dif < ((int) $date['time'] )) {
                $date['time'] = $date['time'] - $dif;
            } else {
                $date['time'] = 0;
            }
        } else {
            Session::forget('ttime1' . $request->id);
            Session::put('ttime1' . $request->id, time());
            Session::save();
        }
       
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
        $date['total'] = DB::table('questions')
                ->select('*')
                ->where('quiz_id', $request->id)
                ->count();
        if($date['total']==0){
            session()->flash('success', 'Please Add Question before Generated');
            return redirect()->route('quiz.all');
        }
        $Question = Quiz::find($request->id);
        $date['time'] = ( $Question->time);
        $date['cDiff'][0] = DB::table('questions')
                ->select('*')
                ->where('difficulty', 'N')
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
        $question->course_id = $this->getcourseidfromQ($request->id);
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
        foreach ($date['courses'] as $key) {
            $data['qresult'][] = DB::table('results')
                    ->join('quizzes', 'quizzes.id', '=', 'results.quiz_id')
                    ->join('users', 'users.id', '=', 'results.user_id')
                    ->join('courses', 'quizzes.course_id', '=', 'courses.id')
                    ->where('quizzes.course_id', $key->id)
                    ->where('quizzes.user_id', Auth::user()->id)
                    ->select('*', 'quizzes.name as name', 'users.name as uname', 'courses.title as ctitle')
                    ->distinct()
                    ->orderBy("courses.id", 'asc')
                    ->get();

            $data['courseTitle'][] = $key->title;
//                       $data['aresult'][]= DB::table('results')
//                ->join('assignments', 'assignments.id', '=', 'results.ass_id')
//                ->join('users', 'users.id', '=', 'results.user_id')
//               ->join('courses', 'assignments.course_id', '=', 'courses.id')
//                ->where('assignments.course_id',$key->id)
////                ->where('results.user_id', Auth::user()->id)
//                ->select('*','assignments.name as name','users.name as uname','courses.title as atitle')
//                ->distinct()
//               ->orderBy("courses.id", 'asc')
//                ->get();
        }

        return view('quiz.teacher.result_index', $data);
    }

    public function treport() {
        $date['courses'] = DB::table('allotments')
                ->join('courses', 'courses.id', '=', 'allotments.course_id')
                ->where('allotments.user_id', Auth::user()->id)
                ->select('courses.*')
                ->distinct()
                ->get();
        foreach ($date['courses'] as $key) {
            $data['qresult'][] = DB::table('final_result')
                    ->join('users', 'users.id', '=', 'final_result.user_id')
                    ->join('courses', 'final_result.course_id', '=', 'courses.id')
                    ->where('final_result.course_id', $key->id)
                    ->select('*', 'users.name as uname', 'courses.title as ctitle')
                    ->distinct()
                    ->orderBy("courses.id", 'asc')
                    ->get();

            $data['courseTitle'][] = $key->title;
        }
        return view('quiz.teacher.report_index', $data);
    }

    public function sreport() {
        $date['courses'] = DB::table('allotments')
                ->join('courses', 'courses.id', '=', 'allotments.course_id')
                ->where('allotments.user_id', Auth::user()->id)
                ->select('courses.*')
                ->distinct()
                ->get();
        foreach ($date['courses'] as $key) {
            $data['qresult'][] = DB::table('final_result')
                    ->join('users', 'users.id', '=', 'final_result.user_id')
                    ->join('courses', 'final_result.course_id', '=', 'courses.id')
                    ->where('final_result.course_id', $key->id)
                     ->where('final_result.user_id', Auth::user()->id)
                    ->select('*', 'users.name as uname', 'courses.title as ctitle')
                    ->distinct()
                    ->orderBy("courses.id", 'asc')
                    ->get();

            $data['courseTitle'][] = $key->title;
        }
        return view('quiz.student.report_index', $data);
    }

    public function sQuizcheck($id) {

        $date['result'] = Result::where('quiz_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
        if (!$date['result'])
            $date['result'] = 0;
        else {
            $date['result'] =  (($date['result']->obtained / $date['result']->total) * 100);
        }
        return $date['result'];
    }
 public function sQuizcheck1($id) {

        $date['result'] = Result::where('quiz_id', $id)
                ->where('user_id', Auth::user()->id)
                ->first();
        if (!$date['result'])
            $date['result'] = 0;
        else {
            $date['result'] = 1+ (($date['result']->obtained / $date['result']->total) * 100);
        }
        return $date['result'];
    }
    public function sAssigmntCheck($id) {

        $date['result'] = Result::where('ass_id', $id['assID'])
                ->where('user_id', $id['userID'])
                ->first();
        if (!$date['result'])
            $date['result'] = 1;
        else {
            $date['result'] = 0;
        }
        return $date['result'];
    }

}
