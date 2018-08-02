@extends('employee.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Invoice</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('employee.home') }}"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('employee.receipt.view_all') }}">Invoice</a></li>
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
                <table class="table table-bordered table-striped">
                    <thead class="alert alert-primary">
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Invoice Date</th>
                            <th>Invoice Number</th>
                            <th>Invoice Amount</th>
                            <th>Driver</th>
                            <th>Vehicle Registration Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $ttl_inv_cost = 0; ?>
                        @foreach($sales as $k => $v) 
                            <tr>
                                <td>{{ $k+1}} </td>
                                <td>{{ $v->customers->name }} <br> {{ $v->customers->adddress }}
                                </td>
                                <td>{{ date('d-m-Y', strtotime($v->invoice_date)) }}</td>
                                <td>{{ $v->invoice_number }}</td>

                                <?php 
                                    $invoice_cost = 0;

                                    $sale_items = DB::table('sale_items')->where('status',1)->where('sale_id', $v->id)->get();

                                    foreach($sale_items as $k1 => $v1) {
                                        $invoice_cost += $v1->total_cost;

                                        $ttl_inv_cost += $v1->total_cost;
                                    }
                                ?>
                                <td>{{ number_format((float)$invoice_cost, 2, '.', '')  }}</td>
                                <td>{{ ucwords($v->driver_name)  }}</td>
                                <td>{{ strtoupper($v->vehicle_number)  }}</td>
                                <td><a class="btn btn-success btn-sm" href="{{ route('employee.receipt.view', Crypt::encrypt($v->id)) }}" target="_blank"> View Details</a></td>
                            
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="4"> TOTAL</th>
                            <th>{{ number_format((float)$ttl_inv_cost, 2, '.', '')  }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            
        </div>
    </div> 
</div>

@stop
