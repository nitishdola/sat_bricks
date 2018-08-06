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
        <h1 class="separator">SAT Bricks| Sardars</h1>
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
                    Sardar Name
                </th>
                <th>
                      Advance
                </th>
                <th>
                   Production Value 
                </th>
                <th>
                   Paid Excess in Advance
                </th>
                <th>
                Amount to be clear
                </th>
                <th>
                
                </th> 
                </tr>

                @if(count($sardars) > 0)
                @foreach($sardars as $sardars)
                <tr>
                <td>
                <?php echo $i;?>
                </td>
                <td>
                <strong><a href="{{route('admin.report.sardar.transactions', ['id'=> $sardars->id ]) }}" class="text-info" data-toggle="tooltip"   title="Sardar Payments Details">{{$sardars->SardarName}}</a></strong>
                </td>
                <td>
                {{$sardars->adv}}
                </td>
                <td>
                {{$sardars->Total_prod}}
                </td>
                <td>
                @if($sardars->Total_prod - $sardars->adv < 0) 
                    {{$sardars->adv - $sardars->Total_prod}} 
                @else
                    0
                @endif
              
                </td>
                <td>
                @if($sardars->Total_prod - $sardars->adv > 0) 
                    {{$sardars->Total_prod - $sardars->adv}} 
                @else
                    0
                @endif
              
                </td>
                <td> 
              
                <a href="{{route('admin.register.sardar.payment.create', ['id'=>$sardars->id]) }}" data-toggle="tooltip" class="btn btn-primary btn-sm" title="Payment">Payment</a>
                </td>
                
                <?php   $i++;?>
                </tr>
                @endforeach
                @endif
                </table>
            
            </div>  
        </div>  
    </div>
</div>
</div>
@stop