

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::text('name',    null  , ['class' => 'form-control required col-md-8', 'id' => 'name', 'placeholder' => 'Sardar Name', 'required' => 'true', ]) !!}
    
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('sardar_type_id') ? 'has-error' : ''}}">
    {!! Form::label('sardar_type *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::select('sardar_type_id', $sardar_types, null, ['class' => 'form-control required col-md-8', 'id' => 'sardar_type_id', 'placeholder' => 'Select Sardar Type', 'required' => 'true', ]) !!}
    
    {!! $errors->first('sardar_type_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('fixed_amount_per_unit') ? 'has-error' : ''}} hideme" id="production">
    {!! Form::label('fixed_amount_per_1000_units *', 'Amount Per 1000 Unit', array('class' => 'form-control-plaintext')) !!}

      {!! Form::text('fixed_amount_per_unit', null , ['class' => 'form-control required col-md-8', 'id' => 'fixed_amount_per_unit', 'placeholder' => 'Fixed amount per 1000 unit', ]) !!}
    
    {!! $errors->first('fixed_amount_per_unit', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('fixed_amount_per_line') ? 'has-error' : ''}} hideme" id="nikashi">
    {!! Form::label('fixed_amount_per_line *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::text('fixed_amount_per_line', null , ['class' => 'form-control required col-md-8', 'id' => 'fixed_amount_per_line', 'placeholder' => 'Fixed amount per line', ]) !!}
    
    {!! $errors->first('fixed_amount_per_line', '<span class="help-inline">:message</span>') !!}
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



<div class="form-group {{ $errors->has('mill_id') ? 'has-error' : ''}}">
    {!! Form::label('Mill *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::select('mill_id', $mills, null, ['class' => 'form-control required col-md-8', 'id' => 'mill_id', 'placeholder' => 'Select Mill', 'required' => 'true', ]) !!}
    
    {!! $errors->first('mill_id', '<span class="help-inline">:message</span>') !!}
</div>