<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('timesheet') ? 'has-error' : ''}}">
    {!! Form::label('timesheet', 'Timesheet', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::file('timesheet', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('timesheet', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
