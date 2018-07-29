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
                Name
                </th>
                <th>
                Mobile No.
                </th>
                <th>
                Address 
                </th>
                <th>
                Sardar Type
                </th>
                <th>
                Mill
                </th> 
                </tr>

                @if(count($sardars) > 0)
                @foreach($sardars as $sardars)
                <tr>
                <td>
                <?php echo $i;?>
                </td>
                <td>
                <strong><a href="{{route('admin.report.sardar.transactions', ['id'=> $sardars->id ]) }}" class="text-info" data-toggle="tooltip"   title="Sardar Payments Details">{{$sardars->name}}</a></strong>
                </td>
                <td>
                {{$sardars->mobile_number}}
                </td>
                <td>
                {{$sardars->address}}
                </td>
                <td>
                {{$sardars->sardar_types->name}}
                </td>
                <td>
                {{$sardars->mills->name}}
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