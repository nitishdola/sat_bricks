<script> 
  function confirmDelete() {    
    if (confirm("Are you sure to Delete the Record!!")) {
        return true;
    }
    else {
        return false;
    } 
  }
 </script>
@extends('admin.layout.default')

@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
    <h1 class="separator">SAT Bricks| Sardar | Transactions</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.employee.index') }}">Sardar</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Transactions</a></li>
    </ol>
        </nav>
    </div>
</div>
@stop 


@section('main_content') 

<div class="row">
    <div class="col-md-12">
        <div class="card"> 
        <div class="card-header bg-dk">
          <h3> Sardar Name : {{ $sardars->name }}
        
          <a class="btn btn-info pull-right" href="{{ route('admin.report.sardar.list') }}">Back</a></h3>
          </div>
        <div class="card-body">   
     
            <div class="table-responsive" >
            <?php $i = 1;?>
                <table class="table table-bordered">
                <tr>
                <th>
                 Sl.
                </th> 
                <th>
               Ledger
                </th>
                <th>
                Date
                </th>
                <th>
                Payment
                </th> 
                <th>
                Recover
                </th>  
                </tr>
                <?php   $totalcr =0; $totaldr =0 ?>
                @if(count($payments) > 0)
                @foreach($payments as $payments)
                <tr>
                <td>
                <?php echo $i;?>
                </td> 
                <td>
                {{$payments->name}}
                </td>
                <td>
                {{$payments->date}}
                </td>
                <td>
                {{$payments->cr}}
                <?php   $totalcr +=$payments->cr   ?>
                </td>  
                <td>
                {{$payments->dr}}
                <?php   $totaldr +=$payments->dr   ?>
                </td>  
                <?php   $i++;?>
                </tr>
                @endforeach
                @endif
                <tr> 
                <td align="right" colspan="3"><h4>Total</h4></td>
                <td><h4>{{number_format($totalcr,2, '.', '') }}</h4></td>
                <td><h4>{{number_format($totaldr,2, '.', '') }}</h4></td>
               
                </tr>
                <tr> 
                <td align="right" colspan="3"><h4>Total Payment</h4></td> 
                <td  colspan="3"><h4>{{number_format($totalcr-$totaldr,2, '.', '') }}</h4></td>
                </tr>
                </table>
            
            </div>  
        </div>  
    </div>
</div>
</div>
@stop
