@if(count($errors))
    <div class="alert alert-danger fade in alert-dismissible" style="opacity:5;">
        <a href="#" class="close" data-dismiss="alert">×</a>
        <i class="fa fa-exclamation-circle"></i>
        <ul>
            @foreach($errors->all() as $error)

                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif