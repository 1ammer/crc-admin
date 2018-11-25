@extends('quiz.layouts.std-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.admin')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Books  </li>
    @endsection
@section('title')
    Books List
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
                        <table class="table table-hover table-striped  " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                 <th>Id</th>
                                <th>Book Name</th>
                                <th>Course Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                                               <?php   $count=1; ?>

                            @if($books)
                                @foreach($books as $lecture)
                                    <tr class="  success  ">
                                        
                                        <th>{{$count++}}</th>
                                        <td>{{$lecture->name}}</td>
                                        <td> {{$lecture->title}}</td>
                                 <td><a href="{{route('lecture.download',$lecture->id)}}" class="btn btn-light"><i
                                                    class="fa fa-download  "></i></a>
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
            $('#dataTable1').DataTable(
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
