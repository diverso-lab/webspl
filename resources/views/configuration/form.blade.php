<div class="box box-info padding-1">
    <div class="box-body">

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
            {{ Form::text('theme', $configuration->theme, ['class' => 'form-control' . ($errors->has('theme') ? ' is-invalid' : ''), 'placeholder' => 'Theme']) }}
            {!! $errors->first('theme', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('php') }}
            {{ Form::text('php', $configuration->theme, ['class' => 'form-control' . ($errors->has('php') ? ' is-invalid' : ''), 'placeholder' => 'PHP Version']) }}
            {!! $errors->first('php', '<div class="invalid-feedback">:message</div>') !!}
        </div>
            <div class="form-group">
            {{ Form::label('storage') }}
            {{ Form::text('storage', $configuration->theme, ['class' => 'form-control' . ($errors->has('storage') ? ' is-invalid' : ''), 'placeholder' => 'Storage']) }}
            {!! $errors->first('storage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('catalog') }}
            {{ Form::text('catalog', $configuration->theme, ['class' => 'form-control' . ($errors->has('catalog') ? ' is-invalid' : ''), 'placeholder' => 'Catalog']) }}
            {!! $errors->first('catalog', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
            <div class="form-group">
            {{ Form::label('search') }}
            {{ Form::text('search', $configuration->theme, ['class' => 'form-control' . ($errors->has('search') ? ' is-invalid' : ''), 'placeholder' => 'Search {advanced, basic}']) }}
            {!! $errors->first('search', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        </div>
            <div class="form-group">
            {{ Form::label('paypal_payment') }}
            {{ Form::text('paypal_payment', $configuration->theme, ['class' => 'form-control' . ($errors->has('paypal_payment') ? ' is-invalid' : ''), 'placeholder' => 'PayPal Payments']) }}
            {!! $errors->first('paypal_payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('creditcard_payment') }}
            {{ Form::text('creditcard_payment', $configuration->theme, ['class' => 'form-control' . ($errors->has('creditcard_payment') ? ' is-invalid' : ''), 'placeholder' => 'Credit Card Payments']) }}
            {!! $errors->first('creditcard_payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mobile_payment') }}
            {{ Form::text('mobile_payment', $configuration->theme, ['class' => 'form-control' . ($errors->has('mobile_payment') ? ' is-invalid' : ''), 'placeholder' => 'Mobile Payment']) }}
            {!! $errors->first('mobile_payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cart') }}
            {{ Form::text('cart', $configuration->theme, ['class' => 'form-control' . ($errors->has('cart') ? ' is-invalid' : ''), 'placeholder' => 'Cart']) }}
            {!! $errors->first('cart', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('security') }}
            {{ Form::text('security', $configuration->theme, ['class' => 'form-control' . ($errors->has('security') ? ' is-invalid' : ''), 'placeholder' => 'Security {high, standard}']) }}
            {!! $errors->first('security', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('backup') }}
            {{ Form::text('backup', $configuration->theme, ['class' => 'form-control' . ($errors->has('backup') ? ' is-invalid' : ''), 'placeholder' => 'Backups']) }}
            {!! $errors->first('backup', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('seo') }}
            {{ Form::text('seo', $configuration->theme, ['class' => 'form-control' . ($errors->has('seo') ? ' is-invalid' : ''), 'placeholder' => 'SEO']) }}
            {!! $errors->first('seo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('twitter_socials') }}
            {{ Form::text('twitter_socials', $configuration->theme, ['class' => 'form-control' . ($errors->has('twitter_socials') ? ' is-invalid' : ''), 'placeholder' => 'Twitter']) }}
            {!! $errors->first('twitter_socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('facebook_socials') }}
            {{ Form::text('facebook_socials', $configuration->theme, ['class' => 'form-control' . ($errors->has('facebook_socials') ? ' is-invalid' : ''), 'placeholder' => 'Facebook']) }}
            {!! $errors->first('facebook_socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('youtube_socials') }}
            {{ Form::text('youtube_socials', $configuration->theme, ['class' => 'form-control' . ($errors->has('youtube_socials') ? ' is-invalid' : ''), 'placeholder' => 'YouTube']) }}
            {!! $errors->first('youtube_socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>