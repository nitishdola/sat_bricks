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
    <h1 class="separator">SAT Bricks| Employee | Salary Register</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.employee.index') }}">Employee</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Salary Register</a></li>
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
{!! Form::open(['method' => 'GET', 'route' => ['admin.register.employee.index']]) !!}
     
              {{ csrf_field() }} 
                    <div class="row">
                        <div class="col-md-12  mg-1">
                            <div class="form-group input-group col-md-3">
                                <input type="text" placeholder="Search by Name"
                                    name="q" autocomplete="off" class="form-control " value=""    >
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
                Month and Year
                </th>
                <th>
                Salary Amount
                </th>
                <th>
               Salary Date
                </th>  
                </tr>
                
                <tr>
                <td>
               1
                </td>
                <td>
               Jack Daniel
                </td>
                <td>
                Feb-2018
                </td>
                <td>
                5000.00
                 
                </td>
                <td>
                 12-03-2018
                </td>  
                 
                </tr> 
                <tr>
                <td>
               2
                </td>
                <td>
               Raju Mehta
                </td>
                <td>
                Feb-2018
                </td>
                <td>
                5000.00
                 
                </td>
                <td>
                12-03-2018
                </td>  
                 
                </tr> 
                <tr>
                <td>
               3
                </td>
                <td>
               Smith Singh
                </td>
                <td>
                Feb-2018
                </td>
                <td>
                5000.00
                 
                </td>
                <td>
                12-03-2018
                </td>  
                 
                </tr> 
                <tr>
                <td></td>
                <td></td>
                <td align="right"><h4>Total</h4></td>
                <td><h4>15000.00 </h4></td>
                 
                </tr>
                </table>
            
            </div>  
        </div>  
    </div>
</div>
</div>
@stop
