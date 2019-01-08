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
                       <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Time</th>
                                <!--<th>Status</th>-->
                              <th>Quiz Start</th>
                              <th>Marks</th>
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
                                      <td>
                                          
                                         
                                              <?php
                                        $QuizController= new \App\Http\Controllers\QuizController();
                                         $flag=$QuizController->sQuizcheck($quiz->id);
                                            ?>
                                         @if(!$flag)
                                          <a href="{{route('quiz.start',$quiz->id)}}" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i> Start</a>
                                     
                                      @endif
                                      </td>
                                     <td> 
                                          @if($flag)
                                     {{$flag}}%
                                                                           @endif

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
                        <input type="hidden" name="type" value="quiz">
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
