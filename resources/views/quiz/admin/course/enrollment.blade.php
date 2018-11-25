@extends('quiz.layouts.admin-layout.master')
@section('scripts')
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('course.all')}}">Course Enrollment</a>
    </li>
    <li class="breadcrumb-item active">Enrollment</li>
@endsection
@section('title')
    Course   {{$course->code}}
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">

        <form method="POST" action="{{route('course.enrollment',$course->id)}}">

            {{csrf_field()}}
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$course->id}}"/>
                        <label class="control-label " for="code">Course CODE</label>
                        <input class="form-control" id="code" name="code" required type="text"
                               placeholder="Please Enter CODE.." value="{{$course->code}}" disabled/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="title">Title</label>
                        <input class="form-control" id="title" required name="title" type="text"
                               placeholder="Please Enter title." value="{{$course->title}}"  disabled/>
                    </div>
                </div>
            </div>
           
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="teacher">Teacher</label>
                        <select name="teacher" id="teacher" class="form-control"  >
                            <option value="">Please Select Teacher</option>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
               <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="student">Students</label>
                        <select name="student[]" id="student" multiple class="form-control" required>
                            <option value="">Please Select Students</option>
                            @foreach($students as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>  
            
<div class="form-group">
    <label class="col-md-4 control-label" for="rolename">Role Name</label>
    <div class="col-md-4">
       
    </div>
</div>
         
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Add Course</button>
                </div>
            </div>
        </form>

    </div>
@endsection
