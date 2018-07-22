<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::text('name',    null  , ['class' => 'form-control required col-md-8', 'id' => 'name', 'placeholder' => 'Sardar Name', 'required' => 'true', ]) !!}
    
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
    
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('sardar_type_id') ? 'has-error' : ''}}">
    {!! Form::label('sardar_type *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::select('sardar_type_id', $sardar_types, null, ['class' => 'form-control required col-md-8', 'id' => 'sardar_type_id', 'placeholder' => 'Select Sardar Type', 'required' => 'true', ]) !!}
    
    {!! $errors->first('sardar_type_id', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('mill_id') ? 'has-error' : ''}}">
    {!! Form::label('Mill *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::select('mill_id', $mills, null, ['class' => 'form-control required col-md-8', 'id' => 'mill_id', 'placeholder' => 'Select Mill', 'required' => 'true', ]) !!}
    
    {!! $errors->first('mill_id', '<span class="help-inline">:message</span>') !!}
</div>