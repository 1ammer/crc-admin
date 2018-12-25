@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
<li class="breadcrumb-item" style="align-content: center">
         Welcome to {{Auth::user()->name}}
    </li>
   
    @endsection
    @section('scripts')
    <script type="text/javascript">
 
//        $(document).ready(function() {
//            $('#content-wrapper').css("background-image",
//            "url(http://localhost/CRC-Admin/public/images/bg.jpg)");  
//             $('#content-wrapper').css("background-position","center"); 
//                          $('#content-wrapper').css("background-repeat","no-repeat"); 
//
//         }); 
    </script>
@endsection
@section('content')
<div class="row">
    @if(isset($courses))
     @foreach($courses as $course)
<!--        <div class="col-md-3 col-sm-6 col-xs-12"style="background-color:lightred">
          <div class="info-box" >
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
               
                
                 
              <span class="info-box-text">{{ ($course->code)}}</span>
              <span class="info-box-text">{{ ($course->title)}}</span>
           
            </div>
            
          </div>
          
        </div>
     -->
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

