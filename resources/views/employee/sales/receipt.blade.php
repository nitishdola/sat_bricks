@extends('employee.layout.default')
 
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">SAT Bricks| Sales</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('employee.home') }}"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('employee.receipt.view_all') }}">Sales</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Receipt</a></li>
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
                <div class="invoice-wrapper">
              <div class="invoice-header border-bottom">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <h1>INVOICE</h1>
                  </div>
                  <div class="col-sm-12 col-md-6 text-right">
                    <div class="logo-wrapper">
                      <svg class="logo" width="35" height="35" viewBox="0 0 54.03 56.55">
                        <defs>
                          <linearGradient id="logo_background_color">
                            <stop class="stop1" offset="30%"></stop>
                            <stop class="stop2" offset="80%"></stop>
                            <stop class="stop3" offset="100%"></stop>
                          </linearGradient>
                        </defs>
                        
                      </svg>
                      <span class="brand-text">SAT Bricks</span>
                    </div>
                    <address class="address m-t-10">
                      Hajo, Kamrup(Rural)<br>
                      Phone: +1 888-555-0000<br>
                    </address>
                  </div>
                </div>
                  <div class="invoice-summary">
                    <div class="row">

                        <div class="col-sm-12 col-md-6">
                            <div class="sub-title">Invoice to</div>
                            <address class="address">
                              {{ $sale->customers->name }}<br>
                              {{ $sale->customers->address }}<br>
                              {{ $sale->customers->mobile_number }}<br>
                            </address>
                        </div>
                            <div class="col-sm-12 col-md-6 text-right">
                              <ul class="summary">
                                <li><span class="f-w-500">Invoice #:</span> {{ $sale->invoice_number }}</li>
                                <li><span class="f-w-500">Invoice date:</span> {{ date('d-m-Y', strtotime($sale->invoice_date)) }}</li>
                              </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="invoice-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th width="7%">Sl No</th>
                            <th>Item</th>
                            <th>Unit</th>
                            <th class="text-right">QTY</th>
                            <th class="text-right">Unit Price</th>
                            <th class="text-right">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $ttl = 0; ?>
                            @foreach($sale_items as $k => $v)
                            <?php $ttl += $v->total_cost; ?>
                              <tr>
                                <th scope="row">{{ $k+1 }}</th>
                                <td>{{ $v->brick_type->name }}
                                </td>

                                <td>{{ $v->brick_type->unit }}
                                </td>
                                <td class="text-right">{{ $v->quantity }}</td>
                                <td class="text-right">{{ $v->unit_cost }}</td>
                                <td class="text-right">{{ $v->total_cost }}</td>
                              </tr>
                            @endforeach
                          
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="5" style="text-align: right;"> TOTAL</th>
                                <th style="text-align: right;">{{ number_format((float)$ttl, 2, '.', '')  }}
                                    <br>
                                    ( {{ Helper::convrtToIndianCurrency($ttl) }} )
                                </th>
                            </tr>

                            <tr>
                                <th colspan="5" style="text-align: right;"> FARE</th>
                                <th style="text-align: right;">{{ number_format((float)$sale->fare, 2, '.', '')  }}
                                    
                                </th>
                            </tr>

                            <tr>
                                <th colspan="5" style="text-align: right;">TOTAL AMOUNT TO BE PAID</th>
                                <th style="text-align: right;">{{ number_format((float)($ttl+$sale->fare), 2, '.', '')  }}
                                 
                                </th>
                            </tr>

                            <tr>
                                <th colspan="5" style="text-align: right;">AMOUNT PAID</th>
                                <th style="text-align: right;">{{ number_format((float)$voucher_trans->cr, 2, '.', '')  }}
                                 
                                </th>
                            </tr>
                            @if( ($ttl+$sale->fare) -  $voucher_trans->cr > 0)
                            <tr>
                                <th colspan="5" style="text-align: right;"> BALANCE</th>
                                <th style="text-align: right;"> 
                                {{ number_format((float)( ($ttl+$sale->fare) -  $voucher_trans->cr), 2, '.', '')  }}
                                 
                                </th>
                            </tr>
                            @endif
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>

            </div>

            <div class="card-footer bg-light">
            <button class="btn btn-primary pull-right m-t-20 m-b-20">PRINT</button>
            </div>
        </div>
    </div> 
</div>

@stop
