@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.admin')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Results  </li>
    @endsection
@section('title')
       
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
<?php $count = 0?>
 @if(isset($qresult))
     @foreach($qresult as $result)
    
     
    <div class=" ">
        <h1>
            {{$courseTitle[$count++]}}
        </h1>
        <div class=" ">
            <div class=" ">
                <div class=" ">
                    <div class="table-responsive">
                       <table class="table dataTable table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                 <th>Student Name </th>
                                <th>Course Title </th>
                                  <th>Quiz Name </th>
                                 <th>Total</th>
                                 <th>Obtained</th>
                                  <th>Percentage</th>
                                 <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($result)
                                @foreach($result as $quiz)
                                    <tr class="  success  ">
                                        <td>{{$quiz->uname}}   </td>
                                          <td> {{$quiz->ctitle}}</td>
                                        <td> {{$quiz->name}}</td>
                                        <td>{{$quiz->total}}  </td>
                                        <td>{{$quiz->obtained }} </td>
                                         <td>{{
                                          (  $quiz->obtained/$quiz->total)*100
                                        }}%</td>
                                      
                      <td>{{$quiz->created_at}}  </td>
      
                                    </tr>
                                @endforeach
                                @endif
                                  @if(isset($aresult))
                                @foreach($aresult as $quiz)
                                    <tr class="  success  ">
                                        <td>{{$quiz->atitle}}   (Assignment)</td>
                                        <td> {{$quiz->total}}</td>
                                        <td>{{$quiz->obtained}}  </td>
                                        <td>{{
                                          (  $quiz->obtained/$quiz->total)*100
                                        }}%</td>
                                      
                      <td>{{$quiz->created_at}}  </td>
      
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                            
                        </table>
                    </div>

                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->

            <!-- /.panel -->
        </div>
    </div>
      @endforeach
      @endif 
@endsection
@section('scripts')


    <script type="text/javascript">

        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('.dataTable').DataTable(


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
