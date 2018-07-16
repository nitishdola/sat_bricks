 
<div class="tab-content">
    <form  method="POST" action="{{ url('/master/sardar/store') }}"  onsubmit = 'return confirmSubmit()', enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row justify-content-center mg-2">
        <div class="col-md-8">
            <div class="row">
                <label for="name" class="col-sm-2 col-form-label pd-05">Sardar Name: </label>
                <div class="col-sm-6  inline">
                    <input id="name" type="text" autocomplete="off" class="form-control input-sm" name="name" value="" required autofocus>
                </div>                              
            </div>  
            <div class="row">
                <label for="mobile" class="col-sm-2 col-form-label pd-05">Mobile No.: </label>
                <div class="col-sm-6  inline">
                    <input id="mobile" type="text" autocomplete="off" class="form-control input-sm" name="mobile" value="" required >
                </div>                              
            </div>  
            <div class="row">
                <label for="address" class="col-sm-2 col-form-label pd-05">Address: </label>
                <div class="col-sm-6  inline">
                    <textarea id="address" autocomplete="off"    class="form-control input-sm" name="address" value="" required rows="8">
                    </textarea>
                </div>                              
            </div>
            <div class="row">
                <label for="sardar_type" class="col-sm-2 col-form-label pd-05">Sardar Type: </label>
                <div class="col-sm-6  inline">
                    <select name="sardar_type" required id="sardar_type">
                    <option value="">--Select--</option>
                    @foreach($type as $type)
                        <option value="{{$type->id}}" >{{$type->name}}</option>
                    @endforeach
                    </select>
                </div>                              
            </div>
            <div class="row">
                <label for="mill" class="col-sm-2 col-form-label pd-05">Mill : </label>
                <div class="col-sm-6  inline">
                <select name="mill" required id="mill">
                    <option value="">--Select--</option>
                    @foreach($mill as $mill)
                        <option value="{{$mill->id}}" >{{$mill->name}}</option>
                    @endforeach
                    </select>
                </div>                              
            </div>
            <div class="row col-md-offset-2 mg-2"> 
                <div class="col-sm-6 inline">
                <button type="submit" class="btn btn-primary">Submit
                </button>
                <a class="btn btn-danger" href="#">Reset</a>
                </div>                              
            </div>                
        </div>            
    </div>
    </form>
</div>  