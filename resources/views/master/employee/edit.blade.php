@extends('admin.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Employees</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.employee.index') }}">Employees</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
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

                @include('includes.inner_nav')    
                {!! Form::model($employee, array('route' => ['admin.employee.update', Crypt::encrypt($employee->id)], 'id' => 'admin.employee.update')) !!}
                    @include('master.employee._create')
                     
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a  href="{{ route('admin.employee.index') }}"  class="btn btn-danger"  >Back</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop