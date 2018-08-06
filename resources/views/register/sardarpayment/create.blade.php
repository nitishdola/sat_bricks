@extends('admin.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Sardar | Payment</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.employee.index') }}">Sardar</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Payment</a></li>
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
 
                {!! Form::open(array('route' => 'admin.register.sardar.payment.store', 'id' => 'register.sardar.payment.store')) !!}

                    @include('register.sardarpayment._create')
                     
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a  href="{{ route('admin.report.sardar.list') }}"  class="btn btn-danger" >Reset</a>
             
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
calculateTotal = function() {
    totamt=  $('#total_amount').val();
    advrec=  $('#advance_recovery').val(); 
    if(totamt=='')
    {
        totamt=0;
    } 
    if(advrec=='')
    {
        advrec=0;
    } 
    amt = totamt-advrec;
    $('#payment').val(amt.toFixed(2));    
    paid1 =  parseFloat(amt) + parseFloat(advrec) ;
    bal=totamt -paid;
    $('#balance').val(bal.toFixed(2));   

}
calculateBal = function() {
    totamt1=  $('#total_amount').val();
    advrec1=  $('#advance_recovery').val(); 
    amt1 =  $('#payment').val();    
    if(amt1=='')
    {
        amt1=0;
    }  
    paid1 =  parseFloat(amt1) + parseFloat(advrec1) ;
    bal1=totamt1 -paid1;
    if(totamt1<paid1)
    { 
        amt = totamt1-advrec1;
        $('#payment').val(amt.toFixed(2));  
        $('#balance').val('0.00');  
        alert("You cannot pay more than Total Amount");
        false;
    }
    else
    {
        $('#balance').val(bal1.toFixed(2));  
    }

}
</script>
@stop