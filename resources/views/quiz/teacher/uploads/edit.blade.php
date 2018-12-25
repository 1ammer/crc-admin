
@extends('quiz.layouts.admin-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('user.all')}}">Courses List</a>
    </li>
    <li class="breadcrumb-item active">Course Edit  </li>
@endsection
@section('title')
    Edit Course  
@endsection


@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>

    <form method="POST" action="{{{route('course.edit',$course->id)}}}">

        {{csrf_field()}}
         <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="code">Course CODE</label>
                        <input class="form-control" id="code" name="code" required type="text"
                               placeholder="Please Enter CODE.."value="{{$course->code}}" disabled/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="title">Title</label>
                        <input class="form-control" id="title" required name="title" type="text"
                               placeholder="Please Enter title." value="{{$course->title}}"/>
                    </div>
                </div>
            </div>
        <div class="form-row">
            <div class="col-lg-6">
                <div class="form-group"> <!-- Name field -->
                    <label class="control-label " for="degree">Degree Title</label>
                    <select name="degree" id="degree" class="form-control">
                        <option value="">Please Select Degree Title</option>
                        @foreach($degrees as $degree)
                            <option value="{{$degree->id}}" {{$course->degree_id==$degree->id ?'selected':''}} >{{$degree->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
   
        <div class="col-lg-12">
            <div class="form-group">
                <button class="btn btn-success "   type="submit"><i class="fa fa-edit"></i> Edit Course</button>
            </div>
        </div>
    </form>

    <div class="col-lg-6">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
@endsection
