@extends('quiz.layouts.th-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.admin')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Assignments  </li>
    @endsection
@section('title')
  
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>

    <div class="card mb-12">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Submitted Assignments
             
          </div>

        <div class=" ">
            <div class=" ">
                <div class=" ">
                    <div class=" ">
                        <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                 <th>Id</th>
                                <th>Student Registration #</th>
                               <th>Student Name</th>

                                <th>Course Title</th>
                                <th>Comments</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php   $count=1; ?>
                            @if($assign_submit)
                                @foreach($assign_submit as $lecture)
                                  <?php 
                            $data['assID']=$lecture->assignment_id;
                         $data['user_id']=$lecture->user_id;
                         $flag= marksSubmited($data);
                            ?>
                            @if($flag)
                                    @continue
                            @endif
                                    <tr class="  success  ">
                                        <th>{{$count++}}</th>
                                        <td>{{$lecture->RGN}}</td>
                                                                               <td>{{$lecture->uname}}</td>

                                        <td> {{$lecture->title}}</td>
                                          <td> {{$lecture->comment}}</td>
                                 <td>
<!--                                     <a href="{{route('assignment.delete',$lecture->id)}}" style="display: none;"  class="btn btn-danger"><i
                                                    class="fa fa-trash"></i> Delete</a>-->
                                 <a href="{{asset($lecture->pathfile)}}" rel="noopener noreferrer" target="_blank"  class="btn btn-primary"><i
                                                    class="fa fa-eye"></i> View</a>
                                  <a href="{{route('assignment.marks',['aid'=>$lecture->assignment_id,'uid'=>$lecture->user_id])}}"    class="btn btn-primary"><i
                                                    class="fa fa-eye"></i> Marks</a>
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
