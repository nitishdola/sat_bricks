@extends('admin.layout.default')

@section('pageCss')
<style>
.hideme {
    display: none;
}
</style>
@stop

@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Sardars</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sardar.index') }}">Sardars</a></li>
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
                {!! Form::open(array('route' => 'admin.sardar.store', 'id' => 'admin.sardar.store')) !!}

                    @include('master.sardar._sardar_create')
                     
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a  href="{{ route('admin.sardar.create') }}"  class="btn btn-danger" >Reset</a>
             
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop

@section('pageJs')
<script>
$('#sardar_type_id').change(function() { console.log('Test1');
    $sardar_type = $(this).val();

    if($sardar_type != '') { console.log('Test2');
        if($sardar_type == 1) {
            $('#production').fadeOut();
            $('#nikashi').fadeOut();
        }else if($sardar_type == 2){
            $('#nikashi').fadeOut();
            $('#production').fadeIn();
        }else if($sardar_type == 3) {
            $('#production').fadeOut();
            $('#nikashi').fadeIn();
        }
    }
});
</script>
@stop