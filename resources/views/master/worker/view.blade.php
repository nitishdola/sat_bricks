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
        <h1 class="separator">SAT Bricks| Workers</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.worker.index') }}">Workers</a></li>
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
@include('includes.inner_nav')  
{!! Form::open(['method' => 'GET', 'route' => ['admin.worker.index']]) !!}
     
              {{ csrf_field() }} 
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
               Worker Name
                </th>
                <th>
               Sardar Name
                </th> 
                <th>
                Salary
                </th> 
                <th></th>
                </tr>

                @if(count($worker) > 0)
                @foreach($worker as $worker)
                <tr>
                <td>
                <?php echo $i;?>
                </td>
                <td>
                {{$worker->name}}
                </td>
                <td>
                {{$worker->sardars->name}} 
                </td>
                <td>
                {{$worker->salary}} /
                @if($worker->salary_type ==1)  
                     Month
                @else
                     Day
                @endif
                </td>  
                <td align="center">  
                     {!! Form::open(['method' => 'POST', 'route' => ['admin.worker.destroy', $worker->id], 'onsubmit' => 'return confirmDelete()' ]) !!}
                     
                    <a href="{{route('admin.worker.edit', ['id'=>Crypt::encrypt($worker->id)]) }}" data-toggle="tooltip" class="btn btn-sm btn-primary" title="Edit">Edit</a>
                    <button  data-toggle="tooltip" class=" btn btn-danger btn-sm"  title="Delete!">Delete</button>
                    {!! Form::close() !!}
                
                    
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