@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.admin')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Quizzes  </li>
    @endsection
@section('title')
    Quizzes List
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>

    <div class="card mb-12">
        <div class="card-header">
            <i class="fas fa-table"></i>
            
            <span class="pull-right"><a href="{{route('quiz.create')}}" class="btn-success btn-sm"><i
                        class="fa fa-plus"></i> add Quiz</a></span>
          </div>

        <div class="card-body">
            <div class="panel panel-dark">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Difficulty</th>
                                <th>Course</th>
                                <th>Generate</th>
                                <th>Add Question</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($quizzes)
                                @foreach($quizzes as $quiz)
                                    <tr class="  success  ">
                                        <td>{{$quiz->name}}</td>
                                        <td> {{$quiz->difficulty}}</td>
                                        <td>{{$quiz->title}}</td>
                                      <td><a href="{{route('quiz.generate',$quiz->id)}}" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i> Quiz Generate</a></td>
                                                    <td><a href="{{route('quiz.add',$quiz->id)}}"                class="btn btn-primary"><i
                                     class="fa fa-edit"></i> Question add</a></td>
                                 <td><a href="{{route('quiz.delete',$quiz->id)}}"style="display: none;" 
                                                     class="btn btn-danger"><i
                                                    class="fa fa-trash"></i> Delete</a></td>
                                         
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
