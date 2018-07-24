<div class="form-group {{ $errors->has('sardar_id') ? 'has-error' : ''}}">
{!! Form::label('Sardar *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::select('sardar_id', $sardar, null, ['class' => 'form-control required col-md-8', 'id' => 'sardar_id', 'placeholder' => 'Select Sardar', 'required' => 'true', ]) !!}
    
    {!! $errors->first('sardar_id', '<span class="help-inline">:message</span>') !!}

</div>

<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    {!! Form::label('Amount *', '', array('class' => 'form-control-plaintext')) !!}

         {!! Form::text('amount', null , ['class' => 'form-control required col-md-4', 'id' => 'amount', 'placeholder' => 'Dadoon Amount', 'required' => 'true', ]) !!}
    
    {!! $errors->first('amount', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">

    {!! Form::label('Date *', '', array('class' => 'form-control-plaintext')) !!}
        <div class="col-md-4"> 
          {!! Form::text('date', null , ['class' => 'form-control required col-md-12 pick-a-date', 'id' => 'date', 'placeholder' => 'dd-mm-yyyy', 'required' => 'true', ]) !!}
        </div>      
     
    {!! $errors->first('date', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('ledger') ? 'has-error' : ''}}">
    {!! Form::label('Payment from *', '', array('class' => 'form-control-plaintext')) !!}

    {!! Form::select('ledger', $ledger, null, ['class' => 'form-control required col-md-8', 'id' => 'ledger', 'placeholder' => 'Select Payment from', 'required' => 'true', ]) !!}
   
    {!! $errors->first('ledger', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
    {!! Form::label('Remarks', '', array('class' => 'form-control-plaintext')) !!}

    {!! Form::textarea('remarks', null, ['class' => 'form-control required col-md-8', 'id' => 'remarks', 'placeholder' => 'Remarks',  'rows' => 5 ]) !!}
    
 
</div> 