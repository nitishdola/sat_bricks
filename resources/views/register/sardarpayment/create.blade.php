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
                        <a  href="{{ route('admin.register.sardar.create') }}"  class="btn btn-danger" >Reset</a>
             
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

}
</script>
@stop