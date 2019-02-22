@extends('quiz.layouts.std-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('squiz.all')}}">Quiz  </a>
    </li>
    <li class="breadcrumb-item active">  Quiz  </li>
@endsection
@section('title')
Bank Quiz 
<div  style="float:right">  <label id="timedown"> </label>-<label id="timedown1"   > </label>  </div>    
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">

        <form method="POST" id="startQuiz" action="{{route('quiz.qbank',$id)}}">
      {{csrf_field()}}
      <input type="hidden" name="quizid" value="{{($id)}}" />
                <div style="   "> 
   <?php   $count=1; ?>
             @if($questions)
             @foreach($questions as $question)      
      <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group"> <!-- Name field -->
                        <h3 class="control-label" >
                     
                            <input type="checkbox" name="question[]" value=" {{$question->id}} ">
                      {{$question->description}} 
                       
                        </h3>
                    </div>
                                   </div>        

                </div>        
             @endforeach
            @endif 
            <hr>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit">  Submit </button>
                </div>
            </div>
        </form>

    </div>
@endsection