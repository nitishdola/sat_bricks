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
                    @include('master.sardar._sardar_create')
                     
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a  href="{{ route('admin.sardar.index') }}"  class="btn btn-danger"  >Back</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop

@section('pageJs')
<script>

$( window ).on( "load", function() {
    checkSardarFields();
});

checkSardarFields = function() {
    $sardarType = $('#sardar_type_id').val();
    showHideFlds($sardarType);
}


$('#sardar_type_id').change(function() {
    $sardar_type = $(this).val();
    showHideFlds($sardar_type);
});

showHideFlds = function($sardar_type) {
    if($sardar_type != '') {
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
}
</script>
@stop