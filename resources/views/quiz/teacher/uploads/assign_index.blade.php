@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.admin')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Assignments  </li>
    @endsection
@section('title')
    Assignment List
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>

    <div class="card mb-12">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Lectures
            <span class="pull-right"><a href="{{route('assignment.create')}}" class="btn-success btn-sm"><i
                        class="fa fa-plus"></i>Add Assignment</a></span>
          </div>

        <div class="card-body">
            <div class="panel panel-dark">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                 <th>Id</th>
                                <th>Lecture Name</th>
                                <th>Course Title</th>
                                <th>Last Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                              <?php   $count=1; ?>
                            @if($assignments)
                                @foreach($assignments as $lecture)
                                    <tr class="  success  ">
                                        <th>{{$count++}}</th>
                                        <td>{{$lecture->name}}</td>
                                        <td> {{$lecture->title}}</td>
                                          <td> {{$lecture->last_date}}</td>
                                 <td><a href="{{route('assignment.delete',$lecture->id)}}" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                 <a href="#" class="btn btn-primary"><i
                                                    class="fa fa-eye"></i> View</a></td>
                                         
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
