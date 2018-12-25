@extends('quiz.layouts.std-layout.master')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('dashboard.student')}}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Assignments  </li>
@endsection
@section('title')
Assignments List
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
                                <th>Assignment Name</th>
                                <th>Course Title</th>
                                <th>Last Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $count = 1; ?>
                            @if($assignments)
                            @foreach($assignments as $assig)
                            <tr class="  success  ">

                                <th>{{$count++}}</th>
                                <td>{{$assig->name}}</td>
                                <td> {{$assig->title}}</td>
                                <td> {{$assig->last_date}}</td>
                                <td><a href="{{asset($assig->pathfile)}}" rel="noopener noreferrer" download class="btn btn-light"><i
                                            class="fa fa-download  "></i></a>
                                    <a href="{{asset($assig->pathfile)}}" rel="noopener noreferrer"  class="btn btn-primary"><i
                                            class="fa fa-eye"></i> View</a>
                                    <a href="{{route('sa.submit',$assig->id)}}" rel="noopener noreferrer"  class="btn btn-primary"><i
                                            class="fa fa-eye"></i> Submit</a></td>

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
    $(document).ready(function () {
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
