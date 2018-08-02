@extends('employee.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Invoice</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('employee.home') }}"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('employee.receipt.view_all') }}">Sales</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Make Receipt </a></li>
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
                {!! Form::open(array('route' => 'employee.receipt.save', 'id' => 'employee.receipt.save', 'class' => 'form-horizontal')) !!}
                @include('employee.sales._create')

                <button type="submit" class="btn btn-primary">Submit</button>

                {!! Form::close() !!}
            </div>

            
        </div>
    </div> 
</div>

@stop

@section('pageCss')
<style>
#hideMe { display: none; }
</style>
@stop

@section('pageJs')
<script>

$('.brick-type-select').change(function() {
    var brick_type = $(this).val();
    codepassed = $(this).attr('codepassed')

    $('#unit'+codepassed).val('');

    if(brick_type != '') {
        $.blockUI();
        url = data = '';

        data = '&brick_type_id='+brick_type;

        url  = "{{ route('brick_type_data') }}";
        $.ajax({
            
            data : data,
            url  : url,
            type : 'get',

            error : function(resp) {
                 $.unblockUI();
                alert('Oops ! Something wet wrong. Plese try again');
            },

            success : function(resp) {
                 $.unblockUI();
                $('#unit'+codepassed).val(resp.unit);
            }
        });
    }
}); 


calculateTotalCost = function(key) {
    $('#totals'+key).val('');

    qty = $('#quantities'+key).val();
    unit_cost = $('#unit_costs'+key).val();

    $('#totals'+key).val( (qty*unit_cost).toFixed(2));

    
    consoTtl = 0;
    $('.brick-total-cost').each(function (j, x) {
        if($(this).val() != '') {
            consoTtl += parseFloat($(this).val());
        }
    });
    $('#consTotalAmnt').text(consoTtl.toFixed(2));
    $('#amount_paid').val(consoTtl.toFixed(2));  
    $('#consBalAmnt').text('0.00');

}

calculateBalAmt = function(key) { 
    paid = $('#amount_paid').val(); 
    consoTtl = 0;
    $('.brick-total-cost').each(function (j, x) {
        if($(this).val() != '') {
            consoTtl += parseFloat($(this).val());
        }
    }); 
    consoBal =consoTtl-paid;
    $('#consBalAmnt').text(consoBal.toFixed(2)); 

}

addFare = function() {
    if($('#fare').val() != '') {
        fare        = parseFloat($('#fare').val());
    }else{
        fare        = 0;
    }

    ttlC = 0;

    $('.brick-total-cost').each(function (j, x) {
        if($(this).val() != '') {
            ttlC += parseFloat($(this).val());
        }
    });
    //$('#consTotalAmnt').text(parseFloat(ttlC+fare).toFixed(2));

    $('#amount_paid').val(parseFloat(ttlC+fare).toFixed(2));
    
}

$('#name').change(function() {
    $nameVal = $(this).val();

    if(! isNaN($nameVal)) {
        $.blockUI();
        url = data = '';

        url = "{{ route('api.customer_data') }}";
        data = "&customer_id="+$nameVal;

        $.ajax({
            data : data,
            url  : url,
            type : 'get',

            error : function(resp) {
                $.unblockUI();
                alert('Oops ! Something wet wrong. Plese try again');
            },

            success : function(resp) {
                $.unblockUI();
                $('#mobile_number').val(resp.mobile_number);
                $('#address').val(resp.address);
                $('#hideMe').show();
            }
        });
    }
});

$('.selectizeNadd').selectize({
    create:function (input, callback){
        callback({
            value: input,
            text: input
        });

        showHideFlds();
    },
    sortField: 'text'
});

showHideFlds = function() {
    
    $('#hideMe').show();
}


</script>
@stop