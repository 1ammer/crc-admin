@extends('quiz.layouts.admin-layout.master')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('user.all')}}">Users All</a>
    </li>
    <li class="breadcrumb-item active">Create Account</li>
@endsection
@section('title')
    Create User Account
@endsection

@section('content')
    <div class="col-lg-12">
        @include('quiz.layouts.error')
        @include('quiz.layouts.success')
    </div>
    <div class="col-lg-12">

        <form method="POST" id="myForm" action="{{route('user.create')}}">

            {{csrf_field()}}
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="name">Name<span style="color: red">*</span></label>
                        <input class="form-control" id="name" name="name" value="" placeholder="Please Enter Name Here.." onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required/>
                    </div>
                </div>
                <script type="text/javascript">
                        function validate(event) {
                          var key = event.keyCode;
                          return ((key >= 65 && key <= 90) || key == 8);
                        };
                    </script>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="email">Email<span style="color: red">*</span></label>
                        <input class="form-control" id="email" required name="email" type="email"
                               placeholder="sample@xyz.com"   required/>
                    </div>
                </div>
            </div>
                <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="name">Address<span style="color: red">*</span></label>
                        <input class="form-control" id="address" name="address" required type="text"
                               placeholder="Please Enter Address.."  required/>
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="gender">Gender<span style="color: red">*</span></label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Please Select User Type</option>
                            <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                           
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">                 

                 <div class="col-lg-6">
                    <div class="form-group">
                       <label class="control-label " for="password">password</label>
                        <input class="form-control" required id="password " name="password"
                               type="password" placeholder="password  ."/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="mobile">Mobile Number<span style="color: red">*</span></label>
                        <input class="form-control" required id="password-confirm" name="mobile"
                               type="number" placeholder="Mobile Number." min="0"  />
                    </div>
                </div>

            </div>
            <div class="form-row">
<!--                <div class="col-lg-6">
                    <div class="form-group">  Name field 
                        <label class="control-label " for="role_id">User Type<span style="color: red">*</span></label>
                        <select name="role_id" id="role_id" class="form-control" required>
                            <option value="">Please Select User Type   </option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>-->
                <div class="col-lg-6">
                    <div class="form-group"> <!-- Name field -->
                        <label class="control-label " for="degree">Degree Title<span style="color: red">*</span></label>
                        <select name="degree" id="degree" class="form-control" required>
                            <option value="">Please Select Degree Title   required</option>
                            @foreach($degrees as $degree)
                                <option value="{{$degree->id}}">{{$degree->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
             <div class="form-row">
                 <input     name="role_id" value="{{session('role_id')}}"
                        type="hidden"   />
                  <?php if(session('role_id')!=1){ ?>
<!--                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label " for="RGNumber">Registration Number<span style="color: red">*</span></label>
                        <input class="form-control" required id="RGNumber" name="RGNumber" type="text"
                               placeholder="Please Enter Registration Number"   required/>
                    </div>
                </div>-->
                <?php }?>
             </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button class="btn btn-primary "   type="submit"><i class="fa fa-plus"></i> Create User</button>
                </div>
            </div>
        </form>

    </div>
@endsection
