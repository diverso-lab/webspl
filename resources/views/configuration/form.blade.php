<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $configuration->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('admin_email') }}
            {{ Form::text('admin_email', $configuration->admin_email, ['class' => 'form-control' . ($errors->has('admin_email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('admin_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('template') }}
            {{ Form::text('template', $configuration->template, ['class' => 'form-control' . ($errors->has('template') ? ' is-invalid' : ''), 'placeholder' => 'Template']) }}
            {!! $errors->first('template', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('theme') }}
            {{ Form::text('theme', $configuration->theme, ['class' => 'form-control' . ($errors->has('theme') ? ' is-invalid' : ''), 'placeholder' => 'Theme']) }}
            {!! $errors->first('theme', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('content') }}
            {{ Form::text('content', $configuration->content, ['class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Content']) }}
            {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
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
        <div class="form-group">
            {{ Form::label('email_server') }}
            {{ Form::text('email_server', $configuration->email_server, ['class' => 'form-control' . ($errors->has('email_server') ? ' is-invalid' : ''), 'placeholder' => 'Email Server']) }}
            {!! $errors->first('email_server', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('backup') }}
            {{ Form::text('backup', $configuration->backup, ['class' => 'form-control' . ($errors->has('backup') ? ' is-invalid' : ''), 'placeholder' => 'Backup']) }}
            {!! $errors->first('backup', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>