<div class="form-group {{ $errors->has('sardar_id') ? 'has-error' : ''}}">
    {!! Form::label('Sardar *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::select('sardar_id', $sardar, null, ['class' => 'form-control required col-md-8', 'id' => 'sardar_id', 'placeholder' => 'Select Sardar', 'required' => 'true', ]) !!}
    
    {!! $errors->first('sardar_id', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('Worker Name *', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::text('name',    null  , ['class' => 'form-control required col-md-8', 'id' => 'name', 'placeholder' => 'Worker Name', 'required' => 'true', ]) !!}
    
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('salary') ? 'has-error' : ''}}">
    {!! Form::label('Salary', '', array('class' => 'form-control-plaintext')) !!}

      {!! Form::text('salary', null , ['class' => 'form-control required col-md-4', 'id' => 'salary', 'placeholder' => 'Salary', ]) !!}
    
    {!! $errors->first('salary', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('salary_type') ? 'has-error' : ''}}">
    {!! Form::label('Salary Type', '', array('class' => 'form-control-plaintext')) !!}

        {!! Form::select('salary_type', $salary_type, null, ['class' => 'form-control required col-md-4', 'id' => 'salary_type', 'placeholder' => 'Select Salary Type', ]) !!}

    {!! $errors->first('salary_type', '<span class="help-inline">:message</span>') !!}
</div>



 