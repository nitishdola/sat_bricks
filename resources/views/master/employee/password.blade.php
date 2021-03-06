@extends('admin.layout.default')
<script> 
  function confirmChange() {    
    if (confirm("Are you sure to change the password!!")) {
        return true;
    }
    else {
        return false;
    } 
  }
 </script>
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Employees</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.employee.index') }}">Employees</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Change Password</a></li>
            </ol>
        </nav>
    </div>
</div>
@stop 
@section('main_content') 

<div class="row">
    <div class="col-md-12">
        <div class="card"> 
            <div class="card-body">
  
                {!! Form::model($employee, array('route' => ['admin.employee.change', Crypt::encrypt($employee->id)], 'id' => 'admin.employee.update',  'onsubmit' => 'return confirmChange()')) !!}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                      <b>Employee Name: </b>{!! $employee->name !!}
                      
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('password *', '', array('class' => 'form-control-plaintext')) !!}
 
                        {!! Form::password('password', array('placeholder'=>'Password', 'class'=>'form-control required col-md-8' ,'placeholder' => 'Password', 'required' => 'true') ) !!}
                        {!! $errors->first('password', '<span class="help-inline">:message</span>') !!}
                    </div>
                    
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a  href="{{ route('admin.employee.index') }}"  class="btn btn-danger" >Back</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop