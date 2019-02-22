@extends('quiz.layouts.admin-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.admin')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">User Accounts</li>
    @endsection
@section('title')
    All User Accounts
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>

    <div class="card mb-12">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Teachers
            <span class="pull-right"><a href="{{route('user.create')}}" class="btn-success btn-sm"><i
                        class="fa fa-plus"></i> Create User</a></span>
          </div>

        <div class="card-body">
            <div class="panel panel-dark">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped  " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th> 
                                <th>Edit</th>                   <th>Deativate</th>

                                <th>Courses</th>
                            </tr>
                            </thead>
                            <?php $count = 1; ?>
                            <tbody>
                            @if($users)
                                @foreach($users as $user)
                                    <tr class="{{$user->is_active==1 ?'success':'danger'}}">
                                        <td>{{$count++}}</td>
                                        <td> {{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->is_active==1 ?'Active':'Inactive'}}</td> 
                                        <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-primary"><i
                                                    class="fa fa-edit"></i> Edit</a></td>
                                        <td><a href="{{route('user.delete',$user->id)}}" disabled class="btn btn-danger"><i
                                                    class="fa fa-user"></i> Deactivate</a></td> 
                                        <td><a href="{{route('user.courses',$user->id)}}"  class="btn btn-primary"><i
                                                    class="fa fa-user"></i> Courses</a></td>
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
