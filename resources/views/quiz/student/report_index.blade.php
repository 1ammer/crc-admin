@extends('quiz.layouts.std-layout.master')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('dashboard.admin')}}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Report  </li>
@endsection
@section('title')

@endsection

@section('content')
<div class="col-lg-12">
    @include('quiz.layouts.error')
    @include('quiz.layouts.success')
</div>
<?php $count = 0 ?>
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
                    <table class="table dataTable table-hover table-striped  " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Student Name </th>
                                <th>Course   </th>
                                <th>Assignment    </th>
                                <th>Quiz    </th>
                                <th>Mid  </th>
                                <th>Final   </th>
                                <th>Project   </th>
                                <th>Percentage</th>
                                <!--<th>Grade</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @if($result)
                            @foreach($result as $quiz)
                            <tr class="  success  ">
                                <td>{{$quiz->uname}}   </td>
                                <td> {{$quiz->ctitle}}</td>
                                <td> {{$quiz->assign_marks}} %</td>
                                <td> {{$quiz->quiz_marks}} %</td><td>{{$quiz->mid_marks}} %</td>
                                <td>{{$quiz->final_marks }} %</td>
                                  <td>{{$quiz->project_marks }} %</td>

                                <td>{{
                                         ( (( $quiz->quiz_marks +
                                                  $quiz->assign_marks
                                                  +$quiz->final_marks
                                                  +$quiz->project_marks+$quiz->mid_marks)
                                          /100 )*100)
                                    }}%</td>

                                <!--<td>{{$quiz->created_at}}  </td>-->

                            </tr>
                            @endforeach
                            @endif                        </tbody>

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
    $(document).ready(function () {
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
