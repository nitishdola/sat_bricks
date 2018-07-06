@extends('admin.layout.auth')

@section('main_content')
<form class="sign-in-form" action="../../../../themes/quantum-pro/demos/demo6/index.html">
            <div class="card">
                <div class="card-body">
                    
                    <h5 class="sign-in-heading text-center m-b-20">Sign in to your account</h5>
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="checkbox m-b-10 m-t-20">
                        <div class="custom-control custom-checkbox checkbox-primary form-check">
                            <input type="checkbox" class="custom-control-input" id="stateCheck1" checked="">
                            <label class="custom-control-label" for="stateCheck1">  Remember me</label>
                        </div>
                        <a href="../../../../themes/quantum-pro/demos/demo6/auth-forgot-password.html" class="float-right">Forgot Password?</a>
                    </div>
                    <button class="btn btn-primary btn-rounded btn-floating btn-lg btn-block" type="submit">Sign In</button>
                 <p class="text-muted m-t-25 m-b-0 p-0">Don't have an account yet?<a href="../../../../themes/quantum-pro/demos/demo6/auth-register.html"> Create an account</a></p>
                </div>
            </div>
        </form>
@endsection
