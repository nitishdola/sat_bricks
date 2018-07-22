
<div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('customer_name *', '', array('class' => 'control-label text-right col-md-3')) !!}
    <div class="col-md-5">
      {!! Form::select('name',  $customers,  null  , ['class' => 'form-control selectizeNadd', 'id' => 'name', 'placeholder' => 'Select Customer', 'required' => true ]) !!}
    </div>
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div id="hideMe">
  <div class="form-group row {{ $errors->has('mobile_number') ? 'has-error' : ''}}">
      {!! Form::label('mobile_number *', '', array('class' => 'control-label text-right col-md-3')) !!}
      <div class="col-md-5">
        {!! Form::text('mobile_number', null , ['class' => 'form-control required', 'id' => 'mobile_number', 'placeholder' => 'Mobile Number', 'autocomplete' => 'off' ]) !!}
      </div>
      {!! $errors->first('mobile_number', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
      {!! Form::label('address *', '', array('class' => 'control-label text-right col-md-3')) !!}
      <div class="col-md-5">
        {!! Form::textarea('address', null, ['class' => 'form-control required', 'id' => 'address', 'placeholder' => 'Address', 'rows' => 5, 'autocomplete' => 'off' ]) !!}
      </div>
      {!! $errors->first('address', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<hr>
<h3> Items</h3>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Brick Type</th>
      <th>Unit</th>
      <th>Unit Cost</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
  </thead>

  <tbody>
    @for($i = 1; $i <= 3; $i++)
    <tr>
      <td>{{ $i }}</td>
      <td>
        {!! Form::select('brick_type_ids[]', $brick_types, null , ['class' => 'form-control required brick-type-select', 'id' => 'brick_type_ids'.$i, 'placeholder' => 'Select Brick Type',  'codepassed' => $i, 'autocomplete' => 'off']) !!}
      </td>

      <td width="15%">
        {!! Form::text('unit', null , ['class' => 'form-control required brick-unit', 'id' => 'unit'.$i, 'required' => 'true', 'readonly' => true, 'codepassed' => $i, 'autocomplete' => 'off' ]) !!}
      </td>

      <td width="15%">
        {!! Form::text('unit_costs[]', null , ['class' => 'form-control required brick-cost', 'id' => 'unit_costs'.$i,  'codepassed' => $i, 'onkeyup' => 'calculateTotalCost('.$i.')', 'autocomplete' => 'off']) !!}
      </td>

      <td width="15%">
        {!! Form::text('quantities[]', null , ['class' => 'form-control required brick-quantity', 'id' => 'quantities'.$i,  'codepassed' => $i, 'onkeyup' => 'calculateTotalCost('.$i.')', 'autocomplete' => 'off']) !!}
      </td>

      <td width="15%">
        {!! Form::text('totals[]', null , ['class' => 'form-control required brick-total-cost', 'id' => 'totals'.$i, 'codepassed' => $i, 'autocomplete' => 'off' ]) !!}
      </td>

    </tr>
    @endfor
  </tbody>

  <tfoot>
    <tr>
      <th colspan="5">Total Cost</th>
      <th id="consTotalAmnt"></th>
    </tr>
  </tfoot>
</table>
