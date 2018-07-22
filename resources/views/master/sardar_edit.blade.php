@extends('admin.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Sardars</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sardar.index') }}">Sardars</a></li>
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
                {!! Form::model($sardar, array('route' => ['admin.sardar.update', Crypt::encrypt($sardar->id)], 'id' => 'admin.sardar.update')) !!}
                    @include('master._sardar_create')
                     
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a  href="{{ route('admin.sardar.index') }}"  class="btn btn-danger" 
                        style="color:#fff !important">Back</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop