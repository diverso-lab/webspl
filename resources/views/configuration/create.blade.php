@extends('layouts.app')

@section('template_title')
    Create Configuration
@endsection

<!DOCTYPE html>
<html>
<head>
<title>WebSPL</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("https://images.pexels.com/photos/1402787/pexels-photo-1402787.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="/#home" class="w3-bar-item w3-button w3-wide">WebSPL</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="/#about" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> About</a>
      <a href="/configurations" class="w3-bar-item w3-button"><i class="fa fa-cog"></i> Configurator</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="/#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  <a href="/configurations" onclick="w3_close()" class="w3-bar-item w3-button">Configurator</a>
</nav>

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
                        <form method="POST" action="{{ route('configurations.store') }}"  role="form">
                            @csrf

                            @include('configuration.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
