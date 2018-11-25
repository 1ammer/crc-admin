<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quiz Mania</title>

    <!-- Bootstrap core CSS-->
    <link href="{{  asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{  asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{  asset('/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{  asset('/css/sb-admin.css')}}" rel="stylesheet">
@yield('scripts1')
</head>

<body id="page-top" class="sidebar-toggled">

{{-- Nav top--}}

@include('quiz.layouts.admin-layout.nav')
<div id="wrapper">

    <!-- Sidebar -->
    @include('quiz.layouts.admin-layout.sidebar')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              @yield('breadcrumb')
            </ol>

            <!-- Page Content -->
            <h5>@yield('title')</h5>
            <hr>

            @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
     @include('quiz.layouts.admin-layout.footer')

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="{{  asset('/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{  asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{  asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{  asset('/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{  asset('/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{  asset('/js/sb-admin.min.js')}}"></script>
{{--
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-html5-1.5.2/b-print-1.5.2/rr-1.2.4/datatables.min.js"></script>
--}}
@yield('scripts')
</body>

</html>
