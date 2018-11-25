@extends('quiz.layouts.admin-layout.master')
@section('breadcrumb')
<li class="breadcrumb-item" style="align-content: center">
         Welcome to {{Auth::user()->name}}
    </li>
   
    @endsection

@section('content')

    Hi! Admin  You are logged in!

@endsection
