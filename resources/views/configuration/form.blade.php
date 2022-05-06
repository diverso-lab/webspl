<div class="box box-info padding-1">
    <div class="box-body">
        <h4>Website</h4>
        <div class="form-group">
            {{ Form::label('web_name') }}
            {{ Form::text('web_name', $configuration->web_name, ['class' => 'form-control' . ($errors->has('web_name') ? ' is-invalid' : ''), 'placeholder' => 'Web Name']) }}
            {!! $errors->first('web_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('admin_email') }}
            {{ Form::text('admin_email', $configuration->admin_email, ['class' => 'form-control' . ($errors->has('admin_email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('admin_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('theme') }}
            {!! Form::select('theme', ['go' => 'Go','calibri-wp' => 'Calibri'], 'go') !!}
            {!! $errors->first('theme', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <br>
        <h4>Server</h4>
        <div class="form-group">
            {{ Form::label('PHP') }}
            {!! Form::select('php', ['7.4' => '7.4','8.1' => '8.1'], '7.4') !!}
            {!! $errors->first('php', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <div class="form-group">
            {{ Form::label('storage') }}
            {!! Form::select('storage', ['ENOUGH' => 'Enough','LOW' => 'Low'], 'LOW') !!}
            {!! $errors->first('storage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <br>
        <h4>Features</h4>
        </div>
        <div class="form-group">
            {{ Form::label('search') }}
            {!! Form::select('search', ['BASIC' => 'Basic','ADVANCED' => 'Advanced'], 'BASIC') !!}
            {!! $errors->first('search', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('security') }}
            {!! Form::select('security', ['HIGH' => 'High','STANDARD' => 'Standard'], 'STANDARD') !!}
            {!! $errors->first('security', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
            <div class="form-group">
            {{ Form::label('paypal_payment') }}
            {!! Form::select('paypal_payment', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('paypal_payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('creditcard_payment') }}
            {!! Form::select('creditcard_payment', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('creditcard_payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mobile_payment') }}
            {!! Form::select('mobile_payment', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('mobile_payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('backup') }}
            {!! Form::select('backup', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('backup', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('seo') }}
            {!! Form::select('seo', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('seo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('twitter_socials') }}
            {!! Form::select('twitter_socials', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('twitter_socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('facebook_socials') }}
            {!! Form::select('facebook_socials', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('facebook_socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('youtube_socials') }}
            {!! Form::select('youtube_socials', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('youtube_socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>