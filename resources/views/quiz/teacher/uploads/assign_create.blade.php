@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('assignment.all')}}">Assignment List</a>
    </li>
    <li class="breadcrumb-item active">ADD Assignment  </li>
@endsection
@section('title')
    ADD Assignment  
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">
  
        <form method="POST" action="{{route('assignment.create')}}"  enctype="multipart/form-data">

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
                </div> <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="name">Assignment Name<span style="color: red">*</span></label>
                        <input class="form-control" id="code" name="name" required type="text"
                               placeholder="Please Enter Name.."/>
                    </div>
                </div>
            </div>
            <div class="form-row">
               <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="name">Last Date<span style="color: red">*</span></label>
                        <input min="{{date('Y-m-d')}}" class="form-control" id="date" name="date" required type="date"
                               placeholder=""/>
                    </div>
                </div>
<!--                <script type="text/javascript">
                    var today = new Date().toISOString().split('T')[0];
                    document.getElementsByName("date")[0].setAttribute('min', today);
                </script>-->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="file">Select File<span style="color: red">*</span></label>
                        <input class="form-control" id="file" required name="file" type="file"
                               placeholder="Please Enter title."/>
                    </div>
                </div>
            </div>
           
          
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Add Assignment</button>
                </div>
            </div>
        </form>

    </div>
@endsection