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
        <h1 class="separator">SAT Bricks| Ledger</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sardar.index') }}">Sardars</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">View</a></li>
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
{!! Form::open(['method' => 'GET', 'route' => ['admin.sardar.index']]) !!} 
                    <div class="row">
                        <div class="col-md-12  mg-1">
                            <div class="form-group input-group col-md-3">
                                <input type="text" placeholder="Search by Name"
                                    name="q" autocomplete="off" class="form-control " value="{{ $request->q }}"    >
                                <span class="input-group-btn">
                                <button class="btn btn-info" type="submit" data-toggle="tooltip"   title="Search!"><i class="icon dripicons-search" style="color:#fff" ></i>
                                </button></span>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
            <div class="table-responsive" >
            <?php $i = 1;?>
                <table class="table table-bordered">
                <tr>
                <th>
                 Sl.
                </th>
                <th>
                    Ledger Name
                </th>
               
                <th>
                Credit
                </th>
                <th>
                Debit
                </th> 
                </tr>
<?php $totalcr =0 ; $totaldr =0 ; ?>
                @if(count($ledger) > 0)
                @foreach($ledger as $ledger)
                <tr>
                <td>
                <?php echo $i;?>
                </td>
                <td>
                <strong><a href="{{route('admin.report.sardar.transactions', ['id'=> $ledger->id ]) }}" class="text-info" data-toggle="tooltip"   title="Ledger">{{$ledger->name}}</a></strong>
                </td>
                <td>
                @if($ledger->amt  > 0) 
                    {{$ledger->amt}} 
                    <?php   $totalcr +=$ledger->amt   ?>
                @else
                    0
                @endif
                </td>
                <td>
                @if($ledger->amt  <  0) 
                    {{ -$ledger->amt}} 
                    <?php  $dr = -$ledger->amt;  $totaldr += $dr  ?>
                @else
                    0
                @endif
                </td> 
                
                <?php   $i++;?>
                </tr>
                @endforeach
                @endif
                <tr> 
                <td align="right" colspan="2"><h4>Total</h4></td>
                <td><h4>{{number_format($totalcr,2, '.', '') }}</h4></td>
                <td><h4>{{number_format($totaldr,2, '.', '') }}</h4></td>
                </tr>
                </table>
            
            </div>  
        </div>  
    </div>
</div>
</div>
@stop