@extends('quiz.layouts.std-layout.master')
@section('breadcrumb')
<li class="breadcrumb-item" style="align-content: center">
    Welcome to {{Auth::user()->name}}
</li>

@endsection
@section('scripts')
    <script type="text/javascript">
 
        {{--$(document).ready(function() {
            $('#content-wrapper').css("background-image",
            "url(http://localhost/CRC-Admin/public/images/bg.jpg)");  
             $('#content-wrapper').css("background-position","center"); 
                          $('#content-wrapper').css("background-repeat","no-repeat"); 

         }); --}}
    </script>
@endsection
@section('content')
<!--<div class="col-lg-12">
    @include('quiz.layouts.error')
    @include('quiz.layouts.success')
</div> -->
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

