@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.admin')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">BOOKS  </li>
    @endsection
@section('title')
    BOOKS List
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>

    <div class="card mb-12">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Books
            <span class="pull-right"><a href="{{route('book.create')}}" class="btn-success btn-sm"><i
                        class="fa fa-plus"></i>Add Book</a></span>
          </div>

        <div class="card-body">
            <div class="panel panel-dark">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
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
                                @foreach($books as $book)
                                    <tr class="  success  ">
                                        <th>{{$count++}}</th>
                                        <td>{{$book->name}}</td>
                                        <td> {{$book->title}}</td>
                                 <td><a href="{{route('book.delete',$book->id)}}" style="display: none;" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i> Delete</a>
                                 <a href="{{asset($book->pathfile)}}" rel="noopener noreferrer" target="_blank"  class="btn btn-primary"><i
                                                    class="fa fa-eye"></i> View</a>
                                 </td>
                                         
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
              

                {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    }


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
