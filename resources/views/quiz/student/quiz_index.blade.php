@extends('quiz.layouts.std-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.admin')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Quizzes  </li>
    @endsection
@section('title')
    Quizzes  
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>

   
    <div class=" ">
        <div class=" ">
            <div class=" ">
                <div class=" ">
                    <div class="table-responsive">
                       <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Time</th>
                                <!--<th>Status</th>-->
                              <th>Quiz Start</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($quizzes)
                                @foreach($quizzes as $quiz)
                                    <tr class="  success  ">
                                        <td>{{$quiz->name}}</td>
                                        <td> {{$quiz->title}}</td>
                                        <td>{{$quiz->time}} m</td>
                                        <!--<td>Panding</td>-->
                                      <td><a href="{{route('quiz.start',$quiz->id)}}" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i> Start</a></td> 
                                         
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
