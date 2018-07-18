@extends('admin.layout.default')

@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Sardars</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sardar.index') }}">Sardars</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
            </ol>
        </nav>
    </div>
</div>
@stop

@section('main_content') 

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Sardar Entry</h5>
            <div class="card-body">

                {!! Form::open(array('route' => 'admin.sardar.store', 'id' => 'admin.sardar.store')) !!}

                    @include('master._sardar_create')
                    
                    <div class="card-footer bg-light col-md-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop