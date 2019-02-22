@extends('quiz.layouts.std-layout.master')
 
@section('title')
    Request Quiz 
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">
        <form method="POST"  name="requestform" id="requestform"
              action="{{route('srequest')}}" enctype="multipart/form-data"
>
            {{csrf_field()}}
          
            <div class="form-row">
                
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="count">Course Title</label>
                        <select name="courseid" id="course" class="form-control" required>
                               @if(isset($courses))
                                @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->title}}</option>
                               @endforeach
                                @endif
                        </select>
                        
                    </div>
                </div>

                 
            </div>
           
            <div class="form-row">
                 <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="date">Request Subject</label>
                        <input   class="form-control" id="date" required name="subject"
             type="text"
                               placeholder="Enter Request Subject"/>
                        
                    </div>
                </div>
                
            </div>
                               
            <div class="form-row">
                 <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="date">Details </label>
    
<textarea required  rows="5" cols="40" class="form-control" name="details" form="requestform">Enter Details...
</textarea>                  
    <input   class="form-control" id="date"  name="file"
             type="file"/>
                        
                    </div>
                </div>
               
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Request Submit</button>
                </div>
            </div>
        </form>

    </div>
@endsection