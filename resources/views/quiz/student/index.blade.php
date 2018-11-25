@extends('quiz.layouts.std-layout.master')
@section('breadcrumb')
<li class="breadcrumb-item" style="align-content: center">
         Welcome to {{Auth::user()->name}}
    </li>
   
    @endsection
@section('content')
<div class="row">
     @if(isset($courses))
     @foreach($courses as $course)
         
       <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{  asset('/images/course.jpg')}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ ($course->code)}}</h5>
    <p class="card-text">{{ ($course->title)}}</p>
    <!--<a href="#" class="btn btn-primary">Click Here</a>-->
  </div>
</div>
        
    @endforeach
     @endif     

         
      </div>
    

@endsection

