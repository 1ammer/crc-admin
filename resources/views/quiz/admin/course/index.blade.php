@extends('quiz.layouts.admin-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.admin')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Courses  </li>
    @endsection
@section('title')
    Courses List
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>

    <div class="card mb-12">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Courses
            <span class="pull-right"><a href="{{route('course.create')}}" class="btn-success btn-sm"><i
                        class="fa fa-plus"></i> Add Courses</a></span>
          </div>

        <div class="card-body">
            <div class="panel panel-dark">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>CODE</th>
                                <th>Title</th>
                                <th>Degree</th>
                                <th>Edit</th>
                                <th>Allotment</th>
                            {{--    <th>Delete</th>--}}
                            </tr>
                            </thead>

                            <tbody>
                            @if($courses)
                                @foreach($courses as $course)
                                    <tr class="  success  ">
                                        <td>{{$course->code}}</td>
                                        <td> {{$course->title}}</td>
                                        <td>{{$course->degree->name}}</td>
                                        <td><a href="{{route('course.edit',$course->id)}}" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i> Edit</a></td>
                                      <td><a href="{{route('course.enrollment',$course->id)}}" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i> Allotment</a></td>
                                                     {{--   <td><a href="{{route('course.delete',$course->id)}}" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i> Delete</a></td>--}}
                                         
                                    </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>

                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->

            <!-- /.panel -->
        </div>
    </div>
@endsection
@section('scripts')


    <script type="text/javascript">

        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable(
              /*  {dom: 'Bfrtip',
                //rowReorder: true,
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-primary'

                    }
                    , {
                        extend: 'csv',
                        className: 'btn btn-primary'
                    }
                    , {
                        extend: 'excel',
                        className: 'btn btn-primary'
                    }
                    , {
                        extend: 'pdf',
                        className: 'btn btn-primary'
                    }
                    , {
                        extend: 'print',
                        className: 'btn btn-primary'
                    },
                    {
                        extend: 'colvis',
                        className: 'btn btn-success fa fa-list',
                        text: ''

                    }
                ]
            }*/);
        });

    </script>
@endsection
