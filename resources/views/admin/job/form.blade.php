
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('type') ? 'has-error' : ''}}">
    <div class="col-md-12">
        {!! Form::Label('item', 'Select Type:') !!}
        
        {!! Form::select('item_id', $items, isset($job)?$job->type:null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('type') ? 'has-error' : ''}}">
    <div class="col-md-12">
        {!! Form::Label('sectors', 'Select sectors:') !!}
        
        {!! Form::select('sector_id', $sectors, isset($job)?$job->type:null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('featured', 'Featured', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
       <select name="featured">    
<option>Yes</option>
<option>No</option>
</select>

    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('city') ? 'has-error' : ''}}">
    {!! Form::label('city', 'City', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('city', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('company') ? 'has-error' : ''}}">
    {!! Form::label('company', 'Company', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('company', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
    </div>
</div>

 <div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('salary') ? 'has-error' : ''}}">
    {!! Form::label('salary', 'salary', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('salary', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
    </div>
</div> 

<!-- <select name="status">    
<option>Active</option>
<option>expired</option>
</select> -->

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
       <select name="status">    
<option>Active</option>
<option>expired</option>
</select>

    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
