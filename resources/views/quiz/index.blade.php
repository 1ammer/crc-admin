@extends('quiz.layouts.admin-layout.master')

 
@section('content')<div class="col-lg-12">
    @include('quiz.layouts.error')
    @include('quiz.layouts.success')
</div> 
<div class="row">
    
</div>
<div class="row">
 
    @if(isset($courses))
    @foreach($courses as $course)

    <div class="card" style="width: 18rem;">
         <div class="card-body">
            <h5 class="card-title">{{ ($course->code)}}</h5>
            <p class="card-text">{{ ($course->title)}}</p>
        </div>
    </div>

    @endforeach
    @endif     
         



</div>


@endsection

