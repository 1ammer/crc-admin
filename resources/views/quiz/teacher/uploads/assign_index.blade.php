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
            All Assignments
            <span class="pull-right"><a href="{{route('assignment.create')}}" class="btn-success btn-sm"><i
                        class="fa fa-plus"></i>Add Assignment</a></span>
          </div>

        <div class=" ">
            <div class=" ">
                <div class=" ">
                    <div class=" ">
                        <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                 <th>Id</th>
                                <th>Assignment Name</th>
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
                                 <td>
<!--                                     <a href="{{route('assignment.delete',$lecture->id)}}" style="display: none;"  class="btn btn-danger"><i
                                                    class="fa fa-trash"></i> Delete</a>-->
                                 <a href="{{asset($lecture->pathfile)}}" rel="noopener noreferrer" target="_blank"  class="btn btn-primary"><i
                                                    class="fa fa-eye"></i> View</a>
                                  <a href="{{route('assignment.show',$lecture->id)}}"    class="btn btn-primary"><i
                                                    class="fa fa-eye"></i> Show Assignments</a>
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

<div class="row">
    <div class="col-md-6">
        <!-- DIRECT CHAT -->
        <div class="box box-warning direct-chat direct-chat-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Comments</h3>

                <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                                                                                                    </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    @if($comments)
                            @foreach($comments as $assig)
                    <div id="direct-msg" style="padding-bottom: 10px;">
                                         <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">{{$assig->userName}}</span>
                             
                        </div>
                        <div class="direct-chat-text">
                           
                         {{$assig->message}}
                        </div>
                    </div>
                       </div>
                             @endforeach
                        @endif
                    <div id="commentLoader" class="direct-chat-msg" style="display: none;">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left"></span>
                            <span class="direct-chat-timestamp pull-right"></span>
                        </div>
                        <div class="direct-chat-text" style="opacity: 0.4;">
                            Waiting ....
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                    <form method="POST" action="{{route('comments.create')}}">
                              {{csrf_field()}}
                       <div class="input-group">
                        <input name="message" required="" placeholder="Type Comment ..."
                               class="form-control" type="text">
                        <input type="hidden" name="type" value="assignment">
                                                <input type="hidden" name="id" value="1">

                         <span class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-arrow-right"></i></button>
                          </span>
                    </div>
                </form>
            </div>
            <!-- /.box-footer-->
        </div>
        <!--/.direct-chat -->
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
                    /*{
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
