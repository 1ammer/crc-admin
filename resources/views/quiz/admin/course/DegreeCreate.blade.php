@extends('quiz.layouts.admin-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('course.all')}}">Course List</a>
    </li>
    <li class="breadcrumb-item active">ADD Degree</li>
@endsection
@section('title')
    ADD Degree  
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">

        <form method="POST" action="{{route('degree.create')}}">

            {{csrf_field()}}
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="code">Degree Name<span style="color: red">*</span></label>
                        <input class="form-control" id="name" name="name" required type="text"
                               placeholder="Please Enter Degree.."  required/>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Add Degree</button>
                </div>
            </div>
        </form>

    </div>
@endsection
