<!DOCTYPE html>
<html>
<head>
<title>WebSPL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
      p {
      overflow: hidden;
      max-width: 450px;
    }
    :invalid ~ .test {
      display: none;
    }
    button {
      width: 450px;
      margin: 10px;
    }
    select {
        width: 450px;
        margin: 10px;
    }
    select:focus {
        min-width: 450px;
        width: auto;
    }
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

img.sticky {
  position: fixed;
  left: 30%;
  width: 60%;
  margin:25px 100px;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
</head>
<body>

  <div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
      <a href="/#home" class="w3-bar-item w3-button w3-wide">WebSPL</a>
      <div class="w3-right w3-hide-small">
        <a href="/#about" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> About</a>
        <a href="/configurations" class="w3-bar-item w3-button"><i class="fa fa-cog"></i> Configurator</a>

              <a class="w3-bar-item w3-button" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out"></i> {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      
      </div>
    </div>
  </div>

@extends('layouts.app')

@section('template_title')
    Create Configuration
@endsection

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

              @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Configuration</span>
                    </div>
                    <div class="d-flex justify-content-between card-body">
                        <form method="POST" action="{{ route('configurations.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            
<div class="col-sm box box-info padding-1">
  <div class="box-body">
        
      <div class="col-sm box box-info padding-1 float-right">
          <img class="sticky" src="{{ asset('/images/e-Commerce.png') }}" alt="e-Commerce">
      </div>


      <h4>Website Details</h4>
      <p class="text-danger">{!! session()->get('flama', '<div class="invalid-feedback text-danger"><p class="text-danger">:message</p></div>') !!}</p>
      <div class="form-group">
          {{ Form::label('web_name') }}
          <br><p>This field will be used for naming your website. We do recommend a full lower case name with no spaces</p>
          {{ Form::text('web_name', $configuration->web_name, ['class' => 'form-control' . ($errors->has('web_name') ? ' is-invalid' : ''), 'placeholder' => 'Web Name']) }}
          {!! $errors->first('web_name', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <br>



      <div class="form-group">
          {{ Form::label('admin_email') }}
          <br><p> We will register your email to send you the password for your website, please enter a valid email</p>
          {{ Form::text('admin_email', $configuration->admin_email, ['class' => 'form-control test' . ($errors->has('admin_email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
          {!! $errors->first('admin_email', '<div class="invalid-feedback">:message</div>') !!}
      </div>

      <br>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('theme') }}</p2>
          <br><p> You can a template from the following list, you can change it later too. </p>
          {!! Form::select('theme', ['go' => 'Go','twentytwentyone' => 'Twenty Twenty-One', 'twentysixteen' => 'Twenty Sixteen' ,'blank-canvas'=> 'Blank Canvas'], 'go') !!}
          {!! $errors->first('theme', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <br>

      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('PHP') }}</p2>
          <br> <p>Select the PHP version your WordPress will use. For now, we only support PHP 7.4, but we are working on 8.1</p>
          {!! Form::select('php', ['7.4' => '7.4'], '7.4') !!}
          {!! $errors->first('php', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <br>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('storage') }}</p2>
          <br> <p>Specify the storage your hosting has. (Low < 500 MB)</p>
          {!! Form::select('storage', ['ENOUGH' => 'Enough','LOW' => 'Low'], 'LOW') !!}
          {!! $errors->first('storage', '<div class="invalid-feedback">:message</div>') !!}
          <p class="text-danger">{!! session()->get('storage', '<div class="invalid-feedback text-danger"><p class="text-danger">:message</p></div>') !!}</p>
      </div>
      <br>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('security') }}</p2>
          <br> <p>Decide whether or not you will need a proxy and malware scanner for your website, or only the basics of security. Although we recommend always choosing advanced security, it can lower the general performance </p>
          {!! Form::select('security', ['HIGH' => 'High','STANDARD' => 'Standard'], 'STANDARD') !!}
          {!! $errors->first('security', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <br>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('backup') }}</p2>
          <br><p> Add support for periodic backups</p>
          {!! Form::select('backup', ['0' => 'No','1' => 'Yes'], '0') !!}
          {!! $errors->first('backup', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <br>
      <br>

      <h4>e-Commerce</h4>
      </div>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('search') }}</p2>
          <br><p> Pick your built-in search menu. (Advanced is only useful if you are going to implement custom search queries)</p>
          {!! Form::select('search', ['BASIC' => 'Basic','ADVANCED' => 'Advanced'], 'BASIC') !!}
          {!! $errors->first('search', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <br>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('seo') }}</p2>
          <br><p> Implement SEO rule checker in your website</p>
          {!! Form::select('seo', ['0' => 'No','1' => 'Yes'], '0') !!}
          {!! $errors->first('seo', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <br>    
      <br>
      <h4>Payments</h4>
      <p class="text-danger">{!! session()->get('payments', '<div class="invalid-feedback text-danger"><p class="text-danger">:message</p></div>') !!}</p>
      </div>
          <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('paypal_payment') }}</p2>
          <br> <p>Include PayPal support for Payments</p>
          {!! Form::select('paypal_payment', ['0' => 'No','1' => 'Yes'], '1') !!}
          {!! $errors->first('paypal_payment', '<div class="invalid-feedback">:message</div>') !!}
          <p class="text-danger">{!! session()->get('paypal', '<div class="invalid-feedback text-danger"><p class="text-danger">:message</p></div>') !!}</p>
      </div>
      <br>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('creditcard_payment') }}</p2>
          <br> <p>Include CreditCard support for Payments</p>
          {!! Form::select('creditcard_payment', ['0' => 'No','1' => 'Yes'], '0') !!}
          {!! $errors->first('creditcard_payment', '<div class="invalid-feedback">:message</div>') !!}
          <p class="text-danger">{!! session()->get('creditcard', '<div class="invalid-feedback text-danger"><p class="text-danger">:message</p></div>') !!}</p>
      </div>
      <br>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('mobile_payment') }}</p2>
          <br> <p>Include Mobile Payments</p>
          {!! Form::select('mobile_payment', ['0' => 'No','1' => 'Yes'], '0') !!}
          {!! $errors->first('mobile_payment', '<div class="invalid-feedback">:message</div>') !!}
          <p class="text-danger">{!! session()->get('mobile', '<div class="invalid-feedback text-danger"><p class="text-danger">:message</p></div>') !!}</p>
      </div>
      <br>
      <br>
      <h4>Socials</h4>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('twitter_socials') }}</p2>
          <br><p> Add your Twitter Timeline in the website</p>
          {!! Form::select('twitter_socials', ['0' => 'No','1' => 'Yes'], '0') !!}
          {!! $errors->first('twitter_socials', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <br>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('facebook_socials') }}</p2>
          <br> <p>Add your Facebook Timeline in the website</p>
          {!! Form::select('facebook_socials', ['0' => 'No','1' => 'Yes'], '0') !!}
          {!! $errors->first('facebook_socials', '<div class="invalid-feedback">:message</div>') !!}
      </div>
      <br>
      <div class="form-group">
          <p2 class="fw-bold">{{ Form::label('youtube_socials') }}</p2>
          <br> <p>Embed any YouTube video in your website</p>
          {!! Form::select('youtube_socials', ['0' => 'No','1' => 'Yes'], '0') !!}
          {!! $errors->first('youtube_socials', '<div class="invalid-feedback">:message</div>') !!}
      </div>

      

      <div class="mt-3">
          <br>
          <br>
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>

  </div>

  
</div>
</div>

                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
@endsection
