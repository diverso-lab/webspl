
<div class="box box-info padding-1">
    <div class="box-body">
        <h4>Website Details</h4>
        <div class="form-group">
            {{ Form::label('web_name') }}
            <br>This field will be used for naming your website. We do recommend a full lower case name with no spaces
            {{ Form::text('web_name', $configuration->web_name, ['class' => 'form-control' . ($errors->has('web_name') ? ' is-invalid' : ''), 'placeholder' => 'Web Name']) }}
            {!! $errors->first('web_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('admin_email') }}
            <br>We will register your email to send you the password for your website, please enter a valid email
            {{ Form::text('admin_email', $configuration->admin_email, ['class' => 'form-control' . ($errors->has('admin_email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('admin_email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('theme') }}
            <br> You can a template from the following list, you can change it later too. 
            <br>
            {!! Form::select('theme', ['go' => 'Go','twentytwentyone' => 'Twenty Twenty-One', 'twentysixteen' => 'Twenty Sixteen' ,'blank-canvas'=> 'Blank Canvas'], 'go') !!}
            {!! $errors->first('theme', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>

        <div class="form-group">
            {{ Form::label('PHP') }}
            <br> Select the PHP version your WordPress will use. For now, we only support PHP 7.4, but we are working on 8.1
            <br>
            {!! Form::select('php', ['7.4' => '7.4'], '7.4') !!}
            {!! $errors->first('php', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('storage') }}
            <br> Specify the storage your hosting has. (Low < 500 MB)
            <br>
            {!! Form::select('storage', ['ENOUGH' => 'Enough','LOW' => 'Low'], 'LOW') !!}
            {!! $errors->first('storage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('security') }}
            <br> Decide whether or not you will need a proxy and malware scanner for your website, or only the basics of security. 
            <br>Although we recommend always choosing advanced security, it can lower the general performance
            <br>
            {!! Form::select('security', ['HIGH' => 'High','STANDARD' => 'Standard'], 'STANDARD') !!}
            {!! $errors->first('security', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('backup') }}
            <br> Add support for periodic backups
            <br>
            {!! Form::select('backup', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('backup', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <br>

        <h4>e-Commerce</h4>
        </div>
        <div class="form-group">
            {{ Form::label('search') }}
            <br> Pick your built-in search menu. (Advanced is only useful if you are going to implement custom search queries)
            <br>
            {!! Form::select('search', ['BASIC' => 'Basic','ADVANCED' => 'Advanced'], 'BASIC') !!}
            {!! $errors->first('search', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('seo') }}
            <br> Implement SEO rule checker in your website
            <br>
            {!! Form::select('seo', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('seo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>    
        <br>
        <h4>Payments</h4>
        </div>
            <div class="form-group">
            {{ Form::label('paypal_payment') }}
            <br> Include PayPal support for Payments
            <br>
            {!! Form::select('paypal_payment', ['0' => 'No','1' => 'Yes'], '1') !!}
            {!! $errors->first('paypal_payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('creditcard_payment') }}
            <br> Include CreditCard support for Payments
            <br>
            {!! Form::select('creditcard_payment', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('creditcard_payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('mobile_payment') }}
            <br> Include Mobile Payments
            <br>
            {!! Form::select('mobile_payment', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('mobile_payment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <br>
        <h4>Socials</h4>
        <div class="form-group">
            {{ Form::label('twitter_socials') }}
            <br> Add your Twitter Timeline in the website
            <br>
            {!! Form::select('twitter_socials', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('twitter_socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('facebook_socials') }}
            <br> Add your Facebook Timeline in the website
            <br>
            {!! Form::select('facebook_socials', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('facebook_socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('youtube_socials') }}
            <br> Embed any YouTube video in your website
            <br>
            {!! Form::select('youtube_socials', ['0' => 'No','1' => 'Yes'], '0') !!}
            {!! $errors->first('youtube_socials', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

   

</div>