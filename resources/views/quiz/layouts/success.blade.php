@if (\Session::has('success'))
    <div class="alert alert-success fade in alert-dismissible" style="opacity: 5;">
        <a href="#" class="close pull-right" data-dismiss="alert">×</a>
        <i class="fa fa-check-circle"></i> <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif