<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $configuration->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('template_type') }}
            {{ Form::text('template_type', $configuration->template_type, ['class' => 'form-control' . ($errors->has('template_type') ? ' is-invalid' : ''), 'placeholder' => 'Template Type']) }}
            {!! $errors->first('template_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('security') }}
            {{ Form::text('security', $configuration->security, ['class' => 'form-control' . ($errors->has('security') ? ' is-invalid' : ''), 'placeholder' => 'Security']) }}
            {!! $errors->first('security', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('performance') }}
            {{ Form::text('performance', $configuration->performance, ['class' => 'form-control' . ($errors->has('performance') ? ' is-invalid' : ''), 'placeholder' => 'Performance']) }}
            {!! $errors->first('performance', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('socials') }}
            {{ Form::text('socials', $configuration->socials, ['class' => 'form-control' . ($errors->has('socials') ? ' is-invalid' : ''), 'placeholder' => 'Socials']) }}
            {!! $errors->first('socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>