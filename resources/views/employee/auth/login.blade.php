@extends('employee.layout.auth')

@section('main_content')
{!! Form::open(array('route' => 'employee.postLogin', 'id' => 'employee.postLogin', 'class' => 'sign-in-form')) !!}
    <div class="card">
        <div class="card-body">
                
            <h5 class="sign-in-heading text-center m-b-20"><strong>Employee Login Panel</strong></h5>

            @if(Session::has('message'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {!! Session::get('message') !!}
                    </div>
                </div>
            </div>
            @endif

            <div class="form-group">
                <label for="inputEmail" class="sr-only">Mobile Number</label>
                <input type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Mobile Number" required="">
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password"  name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            </div>
            <button class="btn btn-primary btn-rounded btn-floating btn-block" type="submit">Sign In</button>
         <p class="text-muted m-t-25 m-b-0 p-0"><a href="{{ route('admin.login') }}"> Login as Admin</a></p>
        </div>
    </div>
{!! Form::close() !!}
@endsection
