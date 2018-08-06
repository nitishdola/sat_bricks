 
<div class="form-group {{ $errors->has('sardar_id') ? 'has-error' : ''}}">
    {!! Form::label('Sardar *', '', array('class' => 'form-control-plaintext')) !!} 
 
        {!! Form::select('sardar_id', $sardar, $id, ['class' => 'form-control required col-md-8', 'id' => 'sardar_id', 'placeholder' => 'Select Sardar', 'required' => 'true', ]) !!} 
    {!! $errors->first('sardar_id', '<span class="help-inline">:message</span>') !!} 
</div> 
<div class="form-group {{ $errors->has('total_amount') ? 'has-error' : ''}}">
    {!! Form::label('Total Amount *', '', array('class' => 'form-control-plaintext')) !!}
        {!! Form::text('total_amount', null , ['class' => 'form-control required col-md-4','onkeyup' => 'calculateTotal()', 'id' => 'total_amount', 'placeholder' => 'Total Amount', 'required' => 'true', ]) !!}  
    {!! $errors->first('total_amount', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('advance_recovery') ? 'has-error' : ''}}">
    {!! Form::label('Advance Recovery *', '', array('class' => 'form-control-plaintext')) !!}
        {!! Form::text('advance_recovery', null , ['class' => 'form-control required col-md-4','onkeyup' => 'calculateTotal()', 'id' => 'advance_recovery', 'placeholder' => 'Advance Recovery', 'required' => 'true', ]) !!}
    {!! $errors->first('advance_recovery', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('payment') ? 'has-error' : ''}}">
    {!! Form::label('Amount paid *', '', array('class' => 'form-control-plaintext')) !!}
        {!! Form::text('payment', null , ['class' => 'form-control required col-md-4', 'id' => 'payment', 'placeholder' => 'Amount paid ', 'required' => 'true', 'readonly' => true, ]) !!}    
    {!! $errors->first('payment', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}} col-md-4">
    {!! Form::label('Date *', '', array('class' => 'form-control-plaintext')) !!}
   
        {!! Form::text('date', null , ['class' => 'form-control required col-md-12 pick-a-date', 'id' => 'date', 'placeholder' => 'dd-mm-yyyy', 'required' => 'true', ]) !!}
        
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