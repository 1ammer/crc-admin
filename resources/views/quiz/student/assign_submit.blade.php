@extends('quiz.layouts.std-layout.master')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('dashboard.student')}}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Assignments  </li>
@endsection
@section('title')
Assignments Submission
@endsection

@section('content')
<div class="col-lg-12">
    @include('quiz.layouts.error')
    @include('quiz.layouts.success')
</div> 

<div class="col-lg-12">

    <form method="POST" action="{{route('sa.store')}}"  enctype="multipart/form-data">

        {{csrf_field()}}
        <div class="form-row">
            <div class="col-lg-6">
                <div class="form-group"> <!-- Name field -->
                    <input   id="course" name="assignmentId"   type="hidden"
                             value="{{$assignment_id}}"   />
                    <input class="form-control" id="comment" name="comment" required type="text"
                           placeholder="Please Enter comment about Assignment.."/>
                </div>
            </div> <div class="col-lg-6">

            </div>
        </div>
        <div class="form-row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label " for="file">Select File</label>
                    <input class="form-control" id="file" required name="file" type="file"
                           placeholder="Please Enter title."/>
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="form-group">
                <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i>Submit</button>
            </div>
        </div>
    </form>

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
