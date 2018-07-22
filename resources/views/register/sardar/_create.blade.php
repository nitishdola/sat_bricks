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
        <div class="input-group date dp-years">
            {!! Form::text('date', null , ['class' => 'form-control required col-md-3 datepicker', 'id' => 'date', 'placeholder' => 'dd-mm-yyyy', 'required' => 'true', ]) !!}
            <span class="input-group-addon action">
            <i class="icon dripicons-calendar"></i>
            </span>
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
<script type="text/javascript">
    $('.datepicker').Zebra_DatePicker({
        format: 'd-m-Y'
    });
</script>