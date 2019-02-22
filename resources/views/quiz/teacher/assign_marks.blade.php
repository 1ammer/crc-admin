@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
<!--    <li class="breadcrumb-item">
        <a href="{{route('lecture.all')}}">Quiz List</a>
    </li>
    <li class="breadcrumb-item active">Create Quiz  </li>-->
@endsection
@section('title')
   Enter Marks Against Student Registration : {{$users->RGNumber}}
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">

        <form method="POST" action="{{route('assignment.smarks')}}">

            {{csrf_field()}}
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <input name="assignId" type="hidden" value="{{$asign_id}}">
                         <input name="courseId" type="hidden" value="{{$course_id}}">
                        <input name="userId" type="hidden" value="{{$user_id}}">
                        <label class="control-label " for="course">Assignment Obtain Marks<span style="color: red">*</span></label>
   <input class="form-control" id="amarks" required name="amarks" type="number"
                               placeholder="Please Enter Marks." min="0" required/>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="title">Assignment Total Marks<span style="color: red">*</span></label>
                        <input class="form-control" id="atotal" required name="atotal" type="number"
                               placeholder="  Total Marks."  min="0" required/>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="course">Mid-term Obtain Marks out of 25% <span style="color: red"> ( Optional )</span></label>
   <input class="form-control" id="mid"   name="mid" type="number"
                               placeholder="Please Enter Percentage out of 25%" min="0" max="25" />
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="title">final-term Marks out of 40%<span style="color: red"> ( Optional )</span></label>
                        <input class="form-control" id="final"   name="final" type="number"
                               placeholder="Please Enter Percentage out of 40%"  min="0" max="40" />
                    </div>
                </div>
            </div>
                 <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="course">Project Obtain Marks out of 10% <span style="color: red"> ( Optional )</span></label>
   <input class="form-control" id="project"   name="project" type="number"
                               placeholder="Please Enter Percentage out of 10%" min="0" max="10" />
                    </div>
                </div> 
<!--                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="title">final-term Marks out of 45<span style="color: red"> ( Optional )</span></label>
                        <input class="form-control" id="final"   name="final" type="number"
                               placeholder="  Total Marks."  min="0"  />
                    </div>
                </div>-->
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Submit</button>
                </div>
            </div>
        </form>

    </div>
@endsection