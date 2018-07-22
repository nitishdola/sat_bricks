<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('Ledger Name *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::text('name',    null  , ['class' => 'form-control required col-md-8', 'id' => 'name', 'placeholder' => 'Ledger Name', 'required' => 'true', ]) !!}
    
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('register') ? 'has-error' : ''}}">
    {!! Form::label('Is ledger link with Register', '', array('class' => 'form-control-plaintext')) !!}

    {!! Form::select('register', $register, null, ['class' => 'form-control required col-md-8', 'id' => 'register', 'placeholder' => 'None', ]) !!}
  </div>


<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('Is ledger is Cash in Hand/Bank Ledger', '', array('class' => 'form-control-plaintext')) !!}
    {!! Form::checkbox('cash_ledger',null,null, array('id'=>'cash_ledger')) !!}
   </div>
 
 