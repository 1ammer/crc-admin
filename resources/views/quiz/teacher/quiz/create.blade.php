@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('lecture.all')}}">Quiz List</a>
    </li>
    <li class="breadcrumb-item active">Create Quiz  </li>
@endsection
@section('title')
    Create Quiz 
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">

        <form method="POST" action="{{route('quiz.create')}}">

            {{csrf_field()}}
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="course">Course Title<span style="color: red">*</span></label>
                        <select name="course" id="course" class="form-control" required>
                            <option value="">Please Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="title">Title<span style="color: red">*</span></label>
                        <input class="form-control" id="title" required name="title" type="text"
                               placeholder="Please Enter title."  required/>
                    </div>
                </div>
            </div>
           
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="diff">Quiz Difficulty<span style="color: red">*</span></label>
                        <select name="diff" id="diff" class="form-control" required>
                            
                                <option value="N">Normal </option>
                                <option value="M">Medium </option>  
                                <option value="H">High </option>

                        </select>
                    </div>
                </div><div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="diff">Quiz Time<span style="color: red">*</span></label>
                         <input class="form-control" id="time" required name="time" type="number"
                               placeholder="Please Enter quiz time"   min="0">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Create Quiz</button>
                </div>
            </div>
        </form>

    </div>
@endsection