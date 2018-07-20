<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
{!! Form::label('Sardar *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::select('sardar_id', $sardar, null, ['class' => 'form-control required col-md-8', 'id' => 'sardar_id', 'placeholder' => 'Select Sardar', 'required' => 'true', ]) !!}
    
    {!! $errors->first('sardar_id', '<span class="help-inline">:message</span>') !!}

</div>

<div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
    {!! Form::label('Amount *', '', array('class' => 'form-control-plaintext')) !!}

         {!! Form::text('amount', null , ['class' => 'form-control required col-md-4', 'id' => 'amount', 'placeholder' => 'Dadoon Amount', 'required' => 'true', ]) !!}
    
    {!! $errors->first('amount', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
    {!! Form::label('Date *', '', array('class' => 'form-control-plaintext')) !!}

         {!! Form::text('date', null , ['class' => 'form-control required col-md-4', 'id' => 'amount', 'placeholder' => 'dd/mm/yyyy', 'required' => 'true', ]) !!}
    
    {!! $errors->first('date', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('Remarks', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::textarea('address', null, ['class' => 'form-control required col-md-8', 'id' => 'address', 'placeholder' => 'Remarks', 'required' => 'true','rows' => 5 ]) !!}
    
    {!! $errors->first('address', '<span class="help-inline">:message</span>') !!}
</div>
 