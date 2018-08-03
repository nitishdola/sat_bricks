@extends('employee.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Production</h1>
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

                <div id="results" style="display: none;">
                    <table class="table table-bordered">
                        <thead class="alert alert-primary">
                            <tr>
                                <th>#</th>
                                <th>Worker Name</th>
                                <th>Bricks Produced/Bricks Lined Up</th>
                                <th>Rate Per 1000 Bricks/ Per Line</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody id="prod"></tbody>
                    </table>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <div id="errorInfo" style="display: none;">
                    <div class="alert alert-warning">
                        <h4>NO WORKERS FOUND !</h4>
                    </div>
                </div>

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

        $('#prod').empty();

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
                if(!jQuery.isEmptyObject(resp)) {
                    html = '';
                    $.each(resp, function(key, val) {
                        html += '<tr>';
                        html += '<td>'+(parseInt(key)+1)+'</td>';
                        html += '<td>'+val.name+'</td>';
                        html += '<td><input type="text" id="production_'+key+'" class="form-control" name="productions[]" onkeyup="calculateCost('+key+', '+val.sardars.sardar_type_id+')"><input type="hidden" name="worker_ids[]" value="'+val.id+'"></td>';
                        
                        if(val.sardars.sardar_type_id == 2) {
                            html += '<td><input type="text" value="'+val.sardars.fixed_amount_per_unit+'" readonly="true" id="unit_cost_'+key+'" class="form-control" name="rates[]"></td>';
                        }else if(val.sardars.sardar_type_id == 3) {
                            html += '<td><input type="text" value="'+val.sardars.fixed_amount_per_line+'" readonly="true" id="unit_cost_'+key+'" class="form-control" name="rates[]"></td>';
                        }
                        
                        html += '<td><input type="text" class="form-control" id="results_'+key+'" name="results[]"></td>';
                        html += '</tr>';
                        
                        console.log(html);
                        $('#prod').html(html);
                    });

                    $('#errorInfo').hide();
                    $('#results').show();
                }else{
                    $('#results').hide();
                    $('#errorInfo').show();
                    
                }
            }
        });
    }
});

calculateCost = function(k, sardarTypeID) {
    $production= $('#production_'+k).val();
    $unit_cost = $('#unit_cost_'+k).val();

    if($production != '' && $unit_cost != '') {
        if(sardarTypeID == 1) {
            $('#results_'+k).val( ( ($unit_cost/1000)*$production ).toFixed(2));
        }else if(sardarTypeID == 2){
            $('#results_'+k).val( ($unit_cost*$production ).toFixed(2));
        }
        
    }else{
        $('#results_'+k).val(0);
    }
}
</script>
@stop
