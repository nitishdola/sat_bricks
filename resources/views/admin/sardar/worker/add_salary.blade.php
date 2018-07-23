@extends('admin.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Sardar Worker | Salary</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.employee.index') }}">Sardar</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Sardar Worker Salary</a></li>
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
                {!! Form::open(array('route' => 'admin.employee.store', 'id' => 'admin.employee.store')) !!}

                    @include('admin.sardar.worker._create_salary')
                     
                        <button type="submit" class="btn btn-primary">Submit</button>
             
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop

@section('pageJs')
<script>
$('#sardar_id').change(function() {
    sardar_id = $(this).val();
    url = data = '';

    url = "{{ route('api.sardar_worker_data') }}";
    data = '&sardar_id='+sardar_id;

    console.log(url+data);
    if(sardar_id != '') {
        $.ajax({
            url : url,
            data : data,
            type : 'get',

            error : function(resp) {
                    alert('Oops ! Something went wrong !');
            },

            success : function(resp) {
                var html = '';
                 html +='<option value="">Select Worker</option>';
                $.each(resp, function(index, val) {
                    html += '<option value="'+val.id+'">'+val.name+'</option>';
                });

                $('#worker_id').html(html);
            }
        });
    }

}) ;
</script>
@stop