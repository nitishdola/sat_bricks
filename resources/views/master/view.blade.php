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
        <h1 class="separator">Sardar</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
            </ol>
        </nav>
    </div>
</div>
@stop 
@section('main_content') 

<div class="card-deck m-b-30"> 

    <div class="card">
        <div class="card-body">  
@include('includes.inner_nav')  
            <div class="table-responsive" >
                <table class="table table-bordered">
                <tr>
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
                <th></th>
                </tr>

                @if(count($sardars) > 0)
                @foreach($sardars as $sardars)
                <tr>
                <td>
                {{$sardars->name}}
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
                <td align="center"> 
                
                    <form method="POST" action="{{ route('sardar.delete', $sardars->id) }}" onsubmit = 'return confirmDelete()'>
                    {{ csrf_field() }}  
                    <a href="{{ url('/master/sardar/'.Crypt::encrypt($sardars->id).'/edit')}}" data-toggle="tooltip" class="btn btn-sm btn-primary" title="Edit">Edit</a>
                    
                    <button class=" btn btn-sm btn-danger " data-toggle="tooltip" class=" btn btn-xs btn-danger"  title="Delete!">Delete</button>
                                        
                    </form>
                
                    
                </td>
                </tr>
                @endforeach
                @endif
                </table>
            
            </div>  
        </div>  
    </div>
</div>
@stop