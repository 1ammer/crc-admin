@extends('quiz.layouts.admin-layout.master')
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

    

@endsection
