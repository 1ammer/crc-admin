@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('quiz.all')}}">Quiz List</a>
    </li>
    <li class="breadcrumb-item active">Question  </li>
@endsection
@section('title')
    Add Question   
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">

        <form method="POST" action="{{route('quiz.add',$id)}}">

            {{csrf_field()}}
            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group"> <!-- Name field -->
                        <input   id="id" required name="id" type="hidden"
                                value="{{$id}}"/>  
                        <label class="control-label " for="question">Question<span style="color: red">*</span></label>
                        <input class="form-control" id="question" required name="question" type="text"
                               placeholder="Enter Question."/>
                    </div>
                </div> 
                 
            </div>
           <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="op1">Option 1<span style="color: red">*</span></label>
                        <input class="form-control" id="op1" required name="op1" type="text"
                               placeholder="Enter Option."/>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="op2">Option 2<span style="color: red">*</span></label>
                        <input class="form-control" id="op2" required name="op2" type="text"
                               placeholder="  Enter Option."/>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="op3">Option 3<span style="color: red">*</span></label>
                        <input class="form-control" id="op3" required name="op3" type="text"
                               placeholder="Enter Option."/>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="op4">Option 4<span style="color: red">*</span></label>
                        <input class="form-control" id="op4" required name="op4" type="text"
                               placeholder="  Enter Option."/>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="ans">Answer</label>
                        <select name="ans" id="ans" class="form-control" required>
                                <option value="a">Option a</option>
                                <option value="b">Option b</option>  
                                <option value="c">Option c</option>
                                <option value="d">Option d</option>


                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="diff">Question Difficulty<span style="color: red">*</span></label>
                        <select name="diff" id="diff" class="form-control" required>
                            
                                <option value="N">Normal </option>
                                <option value="M">Medium </option>  
                                <option value="H">High </option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Add Question</button>
                </div>
            </div>
        </form>

    </div>
@endsection