@extends('quiz.layouts.admin-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('course.all')}}">Course List</a>
    </li>
    <li class="breadcrumb-item active">Create Course</li>
@endsection
@section('title')
    Create Course  
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">

        <form method="POST" action="{{route('course.create')}}">

            {{csrf_field()}}
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="code">Course CODE</label>
                        <input class="form-control" id="code" name="code" required type="text"
                               placeholder="Please Enter CODE.."/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="title">Title</label>
                        <input class="form-control" id="title" required name="title" type="text"
                               placeholder="Please Enter title."/>
                    </div>
                </div>
            </div>
           
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="degree">Degree Title</label>
                        <select name="degree" id="degree" class="form-control" required>
                            <option value="">Please Select Degree Title</option>
                            @foreach($degrees as $degree)
                                <option value="{{$degree->id}}">{{$degree->name}}</option>
                            @endforeach
                        </select>
                    </div>
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
