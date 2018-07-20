@extends('admin.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Workers</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.worker.index') }}">Workers</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
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
                {!! Form::open(array('route' => 'admin.worker.store', 'id' => 'admin.worker.store')) !!}

                    @include('master.worker._create')
                     
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a  href="{{ route('admin.worker.create') }}"  class="btn btn-danger" >Reset</a>
             
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop