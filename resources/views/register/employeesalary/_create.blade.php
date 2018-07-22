<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
{!! Form::label('Employee *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::select('employee_id', $employee, null, ['class' => 'form-control required col-md-8', 'id' => 'sardar_id', 'placeholder' => 'Select Employee', 'required' => 'true', ]) !!}
    
    {!! $errors->first('employee_id', '<span class="help-inline">:message</span>') !!}

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

         {!! Form::text('date', null , ['class' => 'form-control required col-md-4', 'id' => 'amount', 'placeholder' => 'dd/mm/yyyy', 'required' => 'true', ]) !!}
    
    {!! $errors->first('date', '<span class="help-inline">:message</span>') !!}
</div>
 
 