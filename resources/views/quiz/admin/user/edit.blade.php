
@extends('quiz.layouts.admin-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('user.all')}}">User Accounts All</a>
    </li>
    <li class="breadcrumb-item active">User Edit Account</li>
@endsection
@section('title')
    Edit User Account
@endsection


@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>

    <form method="POST" action="{{{route('user.edit',$user->id)}}}">

        {{csrf_field()}}
        <div class="form-row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label " for="name">Name</label>
                    <input class="form-control" id="name" name="name" value="{{$user->name}}" type="text"/>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label " for="email">Email</label>
                    <input class="form-control" id="email" name="email" value="{{$user->email}}" type="email" />
                </div>
            </div>
        </div>
        <div class="form-row">

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label " for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password"/>
                </div> </div>
                <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label " for="mobile">Mobile Number</label>
                    <input class="form-control" id="mobile" name="mobile" type="number" value="{{$user->mobile}}"/>
                </div>
            </div>  </div>
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="name">Address</label>
                        <input class="form-control" id="address" name="address" required type="text"
                               placeholder="Please Enter Address.." value="{{$user->address}}"/>
                    </div>
                </div>
            <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="RGNumber">Registration Number</label>
                        <input class="form-control" id="RGNumber" name="RGNumber" required type="text" disabled
                               placeholder="Please Enter Registration Number.." value="{{$user->RGNumber}}"/>
                    </div>
                </div>

        </div>
        <div class="form-row">
            <div class="col-lg-6">
                <div class="form-group"> <!-- Name field -->
                    <label class="control-label " for="role_id">Role</label>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="">Please Select User Role</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" {{$user->role->id==$role->id ?'selected':''}} >{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"> <!-- Name field -->
                    <label class="control-label " for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Please Select Gender</option>
                            <option value="male" {{$user->gender=='male' ?'selected':''}} >Male</option>
                            <option value="female" {{$user->gender=='female' ?'selected':''}} >Female</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-6">
                <div class="form-group"> <!-- Name field -->
                    <label class="control-label " for="is_active">Status</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="">Please Select</option>
                        <option value="1" {{$user->is_active==1 ?'selected':''}}>Active</option>
                        <option value="0" {{$user->is_active==0 ?'selected':''}}>In Active</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"> <!-- Name field -->
                    <label class="control-label " for="degree">Degree Title</label>
                    <select name="degree" id="degree" class="form-control">
                        <option value="">Please Select Degree Title</option>
                        @foreach($degrees as $degree)
                            <option value="{{$degree->id}}" {{$user->degree == $degree->id ?'selected':''}} >{{$degree->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <button class="btn btn-success " name="addUser" type="submit"><i class="fa fa-edit"></i> Edit User</button>
            </div>
        </div>
    </form>

    <div class="col-lg-6">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
@endsection
