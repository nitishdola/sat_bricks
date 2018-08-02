@extends('employee.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Invoice</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('employee.home') }}"><i class="icon dripicons-home"></i></a></li>
               
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Production Entry </a></li>
            </ol>
        </nav>
    </div>
</div>
@stop 

@section('main_content') 

<div class="row">
    <div class="col">
        <div class="card"> 
            <div class="card-body">
                {!! Form::open(array('route' => 'employee.worker.production.save', 'id' => 'worker.production.save', 'class' => 'form-horizontal')) !!}
                <div class="form-group row {{ $errors->has('sardar_id') ? 'has-error' : ''}}">
                    {!! Form::label('sardar *', '', array('class' => 'control-label text-right col-md-3')) !!}
                    <div class="col-md-5">
                      {!! Form::select('sardar_id',  $sardars,  null  , ['class' => 'form-control selectizeNadd', 'id' => 'sardar_id', 'placeholder' => 'Select Sardar', 'required' => true ]) !!}
                    </div>
                    {!! $errors->first('sardar_id', '<span class="help-inline">:message</span>') !!}
                </div>

                <table class="table table-bordered">
                    <thead class="alert alert-primary">
                        <tr>
                            <th>#</th>
                            <th>Worker Name</th>
                            <th>Unit Production/Line Production</th>
                            <th>Rate</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody id="prod"></tbody>
                </table>

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
    $sardar_id = $(this).val();

    if($sardar_id != '') {
        $.blockUI();

        url = data = '';

        url     = "{{ route('api.sardar_worker_data') }}";
        data    = "&sardar_id="+$sardar_id;

        $.ajax({
            data : data,
            url  : url,
            type : 'get',

            error : function(resp) {
                $.unblockUI();
            },

            success : function(resp) {
                $.unblockUI();
                console.log(resp);
            }
        });
    }
});
</script>
@stop
