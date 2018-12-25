<?php

namespace App\Http\Controllers;

use DB;
use App\Role;
use Carbon\Carbon;
use App\User;
use App\Course;
use App\Degree;
use Illuminate\Http\Request;
use App\Allotment;
use Illuminate\Support\Facades\Auth;
use Response;
use Storage;

class LectureController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        ini_set('post_max_size', '2048M');
        ini_set('upload_max_filesize', '2048M');
        $this->middleware('auth');
    }

    public function assignment_submit($id) {
        $date['assignment_id'] = $id;
        $date['user_id'] = Auth::user()->id;

        return view('quiz.student.assign_submit', $date);
    }

    public function lecture_index() {
        $date['lectures'] = DB::table('lectures')
                ->join('courses', 'courses.id', '=', 'lectures.course_id')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('lectures.*', 'courses.title as title')
                ->distinct()
                ->get();
        return view('quiz.student.lecture_index', $date);
    }

    public function assignment_index() {
        $date['assignments'] = DB::table('assignments')
                ->join('courses', 'courses.id', '=', 'assignments.course_id')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->where('last_date', '>=', Carbon::today())
                ->select('assignments.*', 'courses.title as title')
                ->distinct()
                ->get();
        return view('quiz.student.assign_index', $date);
    }

    public function book_index() {
        $date['books'] = DB::table('books')
                ->join('courses', 'courses.id', '=', 'books.course_id')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('books.*', 'courses.title as title')
                ->distinct()
                ->get();
        return view('quiz.student.book_index', $date);
    }

    public function download($id) {

        $Lecture = \App\Lecture::findOrFail($id);

        $req = $Lecture->name . '.' . explode(".", $Lecture->pathfile)[1];
        return Storage::download($Lecture->pathfile, $req);
    }

    public function index() {
        $date['lectures'] = DB::table('lectures')
                ->join('courses', 'courses.id', '=', 'lectures.course_id')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('lectures.*', 'courses.title as title')
                ->distinct()
                ->get();
        return view('quiz.teacher.uploads.index', $date);
    }

    public function AssignmentList() {
        $date['assignments'] = DB::table('assignments')
                ->join('courses', 'courses.id', '=', 'assignments.course_id')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('assignments.*', 'courses.title as title')
                ->distinct()
                ->get();
        return view('quiz.teacher.uploads.assign_index', $date);
    }

    public function bookList() {
        $date['books'] = DB::table('books')
                ->join('courses', 'courses.id', '=', 'books.course_id')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('books.*', 'courses.title as title')
                ->distinct()
                ->get();
        return view('quiz.teacher.uploads.book_index', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AssignmentCreate() {

        $date['degrees'] = Degree::all();
        $date['courses'] = DB::table('courses')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('courses.*')
                ->distinct()
                ->get();

        return view("quiz.teacher.uploads.assign_create", $date);
    }

    public function bookCreate() {

        $date['degrees'] = Degree::all();
        $date['courses'] = DB::table('courses')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('courses.*')
                ->distinct()
                ->get();

        return view("quiz.teacher.uploads.book_create", $date);
    }

    public function create() {

        $date['degrees'] = Degree::all();
        $date['courses'] = DB::table('courses')
                ->join('allotments', 'courses.id', '=', 'allotments.course_id')
                ->where('user_id', Auth::user()->id)
                ->select('courses.*')
                ->distinct()
                ->get();

        return view("quiz.teacher.uploads.create", $date);
    }

    public function AssignmentStore(Request $request) {
        $this->validate(request(), [
            'course' => 'required',
            'name' => 'required',
            'file' => 'required|file',
        ]);
        $file = $request->file('file');

        $file_name = time() . $file->getClientOriginalName();

        $file_path = public_path() . '/upload/';

        $file->move($file_path, $file_name);
        $file_name = 'upload/' . $file_name;

        $assign = new \App\Assignment();
        $assign->name = $request->name;
        $assign->last_date = $request->date;
        $assign->pathfile = $file_name;
        $assign->course_id = $request->course;
        $assign->save();
        session()->flash('success', 'Assignment Created Successfully');

        return redirect()->route('assignment.all');
    }

    public function assignment_store(Request $request) {
        $this->validate(request(), [
            'assignmentId' => 'required',
            'comment' => 'required',
            'file' => 'required|file',
        ]);
        $file = $request->file('file');

        $file_name = time() . $file->getClientOriginalName();

        $file_path = public_path() . '/upload/';

        $file->move($file_path, $file_name);
        $file_name = 'upload/' . $file_name;

        $assignSubmit = new \App\AssignSubmit();
        $assignSubmit->comment = $request->comment;
        $assignSubmit->user_id = Auth::user()->id;

        $assignSubmit->pathfile = $file_name;
        $assignSubmit->assignment_id = $request->assignmentId;
        $assignSubmit->save();
        session()->flash('success', 'Assignment Save Successfully');

        return redirect()->route('dashboard.student');
    }

    public function bookStore(Request $request) {
        $this->validate(request(), [
            'course' => 'required',
            'name' => 'required',
            'file' => 'required|file',
        ]);
        $file = $request->file('file');

        $file_name = time() . $file->getClientOriginalName();

        $file_path = public_path() . '/upload/';

        $file->move($file_path, $file_name);
        $file_name = 'upload/' . $file_name;

        $book = new \App\Book();
        $book->name = $request->name;
        $book->pathfile = $file_name;
        $book->course_id = $request->course;
        $book->save();
        session()->flash('success', 'Book Created Successfully');

        return redirect()->route('book.all');
    }

    public function store(Request $request) {
        $this->validate(request(), [
            'course' => 'required',
            'name' => 'required',
            'file' => 'required|file',
        ]);
        $file = $request->file('file');

        $file_name = time() . $file->getClientOriginalName();

        $file_path = public_path() . '/upload/';

        $file->move($file_path, $file_name);
        $file_name = 'upload/' . $file_name;
//        $nae='ali.'.explode(".",$req)[1];
//        return Storage::download($req,$nae);



        $lecture = new \App\Lecture();
        $lecture->name = $request->name;
        $lecture->pathfile = $file_name;
        $lecture->course_id = $request->course;
        $lecture->save();
        session()->flash('success', 'Course Created Successfully');

        return redirect()->route('lecture.all');
    }

    public function AssignmentDestroy($id) {
        $course = \App\Assignment::findOrFail($id);
        $course->delete();
        session()->flash('success', 'Assignment Deleted Successfully');
        return redirect()->route('assignment.all');
    }

    public function bookDestroy($id) {
        $Book = \App\Book::findOrFail($id);
        $Book->delete();
        session()->flash('success', ' Book Deleted Successfully');
        return redirect()->route('book.all');
    }

    public function destroy($id) {
        $course = \App\Lecture::findOrFail($id);
        $course->delete();
        session()->flash('success', 'Course Deleted Successfully');
        return redirect()->route('lecture.all');
    }

}