<div class="form-group {{ $errors->has('sardar_id') ? 'has-error' : ''}}">
{!! Form::label('Sardar *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::select('sardar_id', $sardars, null, ['class' => 'form-control required col-md-8', 'id' => 'sardar_id', 'placeholder' => 'Select Sardar', 'required' => 'true', ]) !!}
    
    {!! $errors->first('sardar_id', '<span class="help-inline">:message</span>') !!}

</div>


<div class="form-group {{ $errors->has('worker_id') ? 'has-error' : ''}}">
{!! Form::label('Worker *', '', array('class' => 'form-control-plaintext')) !!}

      <select class="form-control required col-md-8" id="worker_id"></select>
    
    {!! $errors->first('worker_id', '<span class="help-inline">:message</span>') !!}

</div>

<div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
    {!! Form::label('Salary Amount *', '', array('class' => 'form-control-plaintext')) !!}

         {!! Form::text('amount', null , ['class' => 'form-control required col-md-4', 'id' => 'amount', 'placeholder' => 'Salary Amount', 'required' => 'true', ]) !!}
    
    {!! $errors->first('amount', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
    {!! Form::label('For the Month and Year *', '', array('class' => 'form-control-plaintext')) !!}
    <div class="input-group  ">
    <select name="month" required   class="form-control required col-md-3" >
        <option>Select Month</option>
        <option>Jan</option>
        <option>Feb</option>
        <option>Mar</option>
        <option>Apr</option>
        <option>May</option>
        <option>Jun</option>
        <option>July</option>
        <option>Aug</option>
        <option>Sep</option>
        <option>Oct</option>
        <option>Nov</option>
        <option>Dec</option>
        </select>  
        <select name="year" required   class="form-control required col-md-3" >
        <option>Select Year</option>
        <option>2017</option>
        <option>2018</option> 
        </select>
        </div>
    {!! $errors->first('date', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
    {!! Form::label('Salary Date *', '', array('class' => 'form-control-plaintext')) !!}
        <div class="col-md-4"> 
         {!! Form::text('date', null , ['class' => 'form-control required col-md-12 pick-a-date', 'id' => 'amount', 'placeholder' => 'dd/mm/yyyy', 'required' => 'true', ]) !!}
     </div>
    
    {!! $errors->first('date', '<span class="help-inline">:message</span>') !!}
</div>
 
 