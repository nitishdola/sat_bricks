@extends('admin.layout.default')
<script>
 function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
  function confirmSubmit() {
    try {
        debugger; 
        var numeric1 = /^[1-9]+$/; 
        var len1 = $("#mobile").val().length;
        if (len1 != 10) {
            alert('Mobile Number should contain 10 digits!');
            $("#mobile").val("");
            $("#mobile").focus();
            return false;
        }
        if (confirm("Are you sure to Save the Record!!")) {
            return true;
        }
        else {
            return false;
        }
    } 
    catch (err)
    {
        alert(err.message);
        return false;
    }
    
  }
 </script>
@section('breadcumb')
<div class="d-flex align-items-center">
    <div class="mr-auto">
        <h1 class="separator">Sardar</h1>
        <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="themes/quantum-pro/demos/demo6/index.html"><i class="icon dripicons-home"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add</a></li>
            </ol>
        </nav>
    </div>
</div>
@stop 
@section('main_content') 
<div class="card">
        <div class="card-body">  
@include('includes.inner_nav') 
<div class="tab-content">
    <form  method="POST" action="{{ url('/master/sardar/store') }}"  onsubmit = 'return confirmSubmit()', enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row justify-content-center mg-2 form-group">
        <div class="col-md-8">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label pd-05">Sardar Name: </label>
                <div class="col-sm-6  inline">
                    <input id="name" type="text" autocomplete="off" class="form-control input-sm" name="name" value="" required autofocus>
                </div>                              
            </div>  
            <div class="form-group row">
                <label for="mobile" class="col-sm-3 col-form-label pd-05">Mobile No.: </label>
                <div class="col-sm-6  inline">
                    <input id="mobile" type="text"  onkeypress="return isNumber(event)" maxlength="10" autocomplete="off" class="form-control input-sm" name="mobile" value="" required >
                </div>                              
            </div>  
            <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label pd-05">Address: </label>
                <div class="col-sm-6  inline">
                    <textarea id="address" autocomplete="off"    class="form-control input-sm" name="address"   required rows="5"></textarea>
                </div>                              
            </div>
            <div class="form-group row">
                <label for="sardar_type" class="col-sm-3 col-form-label pd-05">Sardar Type: </label>
                <div class="col-sm-6  inline">
                    <select name="sardar_type" required id="sardar_type"   class="form-control input-sm" >
                    <option value="">--Select--</option>
                    @foreach($type as $type)
                        <option value="{{$type->id}}" >{{$type->name}}</option>
                    @endforeach
                    </select>
                </div>                              
            </div>
            <div class="form-group row">
                <label for="mill" class="col-sm-3 col-form-label pd-05">Mill : </label>
                <div class="col-sm-6  inline">
                <select name="mill" required id="mill"   class="form-control input-sm" >
                    <option value="">--Select--</option>
                    @foreach($mill as $mill)
                        <option value="{{$mill->id}}" >{{$mill->name}}</option>
                    @endforeach
                    </select>
                </div>                              
            </div>
            <div class="row  offset-md-3 mg-2"> 
                <div class="col-sm-6 inline ">
                <button type="submit" class="btn btn-primary">Submit
                </button>
                <a  href="{{ url('/master/sardar/create')}}"  class="btn btn-danger" style="color:#fff !important">Reset</a>
                </div>                              
            </div>                
        </div>            
    </div>
    </form>
</div>  
</div>
</div>
@stop