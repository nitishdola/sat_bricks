@extends('employee.layout.default')
 

@section('main_content') 

<div class="row">
    <div class="col">
        <div class="card"> 
            <div class="card-body">
                {!! Form::open(array('route' => 'employee.worker.production.view_all', 'id' => 'worker.production.view_all', 'class' => 'form-horizontal', 'method' => 'get')) !!}
                <div class="form-group row {{ $errors->has('sardar_id') ? 'has-error' : ''}}">
                    {!! Form::label('sardar', '', array('class' => 'control-label text-right col-md-3')) !!}
                    <div class="col-md-5">
                      {!! Form::select('sardar_id',  $sardars,  null  , ['class' => 'form-control', 'id' => 'sardar_id', 'placeholder' => 'Select Sardar' ]) !!}
                    </div>
                    {!! $errors->first('sardar_id', '<span class="help-inline">:message</span>') !!}
                </div>

                <div class="form-group row {{ $errors->has('sardar_id') ? 'has-error' : ''}}">
                    {!! Form::label('date_from', '', array('class' => 'control-label text-right col-md-3')) !!}
                    <div class="col-md-5">
                      {!! Form::text('date_from',  null  , ['class' => 'form-control pick-a-date', 'id' => 'sardar_id', 'placeholder' => 'Date Form' ]) !!}
                    </div>
                    {!! $errors->first('date_from', '<span class="help-inline">:message</span>') !!}
                </div>

                <div class="form-group row {{ $errors->has('date_to') ? 'has-error' : ''}}">
                    {!! Form::label('date_to *', '', array('class' => 'control-label text-right col-md-3')) !!}
                    <div class="col-md-5">
                      {!! Form::text('date_to',  null  , ['class' => 'form-control pick-a-date', 'id' => 'date_to', 'placeholder' => 'Date To' ]) !!}
                    </div>
                    {!! $errors->first('date_to', '<span class="help-inline">:message</span>') !!}
                </div>

                <div class="form-group row">
                    {!! Form::label('', '', array('class' => 'control-label text-right col-md-3')) !!}
                    <button type="submit" class="btn btn-success">SEARCH</button>
                </div>

                {!! Form::close() !!}
            </div>

            <div class="card-body">
                @if(count($results))
                <div id="results">
                    <table class="table table-bordered">
                        <thead class="alert alert-primary">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Worker Name</th>
                                <th>Bricks Produced</th>
                                <th>Bricks Lined Up</th>
                                <th>Rate Per 1000 Bricks/ Per Line</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $ttl = 0; ?>
                            @foreach($results as $k => $v)

                            <tr>
                                <td> {{ $k+1 }} </td>
                                <td> {{ $v->date }} </td>
                                <td> {{ $v->worker->name }} </td>
                                <td> {{ $v->bricks_manufactured }} </td>
                                <td> {{ $v->bricks_lined_up }} </td>
                                <td> {{ $v->unit_cost }} </td>
                                <td> {{ $v->total }} </td>
                                <?php $ttl += $v->total; ?>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="6">TOTAL</td>
                                <td>{{ $ttl }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @else
                    <div class="alert alert-danger">
                        <h3 style="color: #FFF; text-align: center;">NO RESULTS FOUND !</h3>
                    </div>
                @endif
            </div>
        </div>
    </div> 
</div>

@stop
