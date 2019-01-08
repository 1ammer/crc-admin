@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('lecture.all')}}">Quiz List</a>
    </li>
    <li class="breadcrumb-item active">Generate Quiz  </li>
@endsection
@section('title')
    Generate Quiz 
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">
        <form method="POST" action="{{route('quiz.generate',$questions[0]->quiz_id)}}">

            {{csrf_field()}}
          
            <div class="form-row">
                
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="count">Question Count</label>
                        <input class="form-control" id="count" required name="count" type="number"
                               min="1" max="{{$total}}"     value="{{$total}}"  placeholder="Enter count"/>
                        <input type="hidden" name="id" value="{{$questions[0]->quiz_id}}" />
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="marks"> Marks per Question</label>
                        <input class="form-control" id="marks" required name="marks" type="number"
                               min="1"  placeholder="Enter Marks"/>
                        
                    </div>
                </div>
            </div>
           
            <div class="form-row">
                 <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="date"> Quiz Date</label>
                        <input min="{{date('Y-m-d')}}" class="form-control" id="date" required name="date" type="date"
                               min="1"  placeholder="Enter Date"/>
                        
                    </div>
                </div>
               <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="diff">Quiz Difficulty</label>
                        <select name="diff" id="diff" class="form-control" required>
                                <option value="R">Random ({{$total}}  Question )</option>
                                <option value="N">Normal ({{isset($cDiff[0] )?$cDiff[0] :''}}  Question ) </option>
                                <option value="M">Medium ({{isset($cDiff[1])?$cDiff[1] :''}}  Question )</option>  
                                <option value="H">High ({{isset($cDiff[2] )?$cDiff[2] :''}}  Question  )</option>

                        </select>
                    </div>
             
            </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Generate</button>
                </div>
            </div>
        </form>

    </div>
@endsection