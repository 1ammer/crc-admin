@extends('quiz.layouts.std-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('squiz.all')}}">Quiz  </a>
    </li>
    <li class="breadcrumb-item active">  Quiz  </li>
@endsection
@section('title')
Start Quiz 
<div  style="float:right">  <label id="timedown"> </label>-<label id="timedown1"   > </label>  </div>    
@endsection

@section('content')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
jQuery(document).ready(function () {
   
  var t = {{$time}} ;
  (function countDown(){
    if (t-->0) {
      $('#timedown').text((t+1) + ' Min');
      setTimeout(countDown, 60*1000);
     } else {
       $( "#startQuiz" ).submit();
     }
  })();
//  var tt=60;
//  (function countDown(){
//    if (tt-->0) {
//      $('#timedown1').text(tt + 'sec');
//      setTimeout(countDown, 1000);
//     }else{ 
//         tt=60;
//     }
//  })();
});
</script>
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">

        <form method="POST" id="startQuiz" action="{{route('quiz.submit')}}">
      <input type="hidden" name="quizid" value="{{ ($questions[0]->quiz_id)}}" />
                  
            {{csrf_field()}}
               <?php   $count=1; ?>
             @if($questions)
             @foreach($questions as $question)
            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group"> <!-- Name field -->
                        <h3 class="control-label" >
                        {{$count++}} -    {{$question->description}}
                        </h3>
                    </div>
                   
                </div> 
                    <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <input type="radio" name="q_{{$question->id}}" value="a" >
                           {{$question->option_a}}
                         
                    </div>
                        <div class="form-group"> <!-- Name field -->
                         <input type="radio" name="q_{{$question->id}}"  value="b" >
                           {{$question->option_b}}
                         
                    </div>
                     
                </div> 
                <div class="col-lg-6">
                   
                    <div class="form-group"> <!-- Name field -->
                        <input type="radio" name="q_{{$question->id}}"  value="c" >
                        {{$question->option_c}}
                    </div>
                     <div class="form-group"> <!-- Name field -->
                        <input type="radio" name="q_{{$question->id}}"  value="d" >
                        {{$question->option_d}}
                    </div>
                      
                </div> 
            </div>
             <hr>
           @endforeach
            @endif
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Submit Quiz</button>
                </div>
            </div>
        </form>

    </div>
@endsection