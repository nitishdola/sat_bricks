<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::text('name',    null  , ['class' => 'form-control required col-md-8', 'id' => 'name', 'placeholder' => 'Employee Name', 'required' => 'true', ]) !!}
    
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
    {!! Form::label('mobile_number *', '', array('class' => 'form-control-plaintext')) !!}

    {!! Form::text('mobile_number', null , ['class' => 'form-control required col-md-8', 'id' => 'mobile_number', 'placeholder' => 'Mobile Number', 'required' => 'true', ]) !!}
    
    {!! $errors->first('mobile_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::textarea('address', null, ['class' => 'form-control required col-md-8', 'id' => 'address', 'placeholder' => 'Address', 'required' => 'true','rows' => 5 ]) !!}
    
    {!! $errors->first('address', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('salary') ? 'has-error' : ''}}">
    {!! Form::label('salary *', '', array('class' => 'form-control-plaintext')) !!}

    {!! Form::text('salary', null , ['class' => 'form-control required col-md-8', 'id' => 'salary', 'placeholder' => 'Salary', 'required' => 'true', ]) !!}
     
    {!! $errors->first('salary', '<span class="help-inline">:message</span>') !!}
</div> 
 