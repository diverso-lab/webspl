@extends('layouts.app')

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

@section('template_title')
    Configuration
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Configurations') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('configurations.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
										<th>Name</th>
                                        <th>Email</th>
										<th>Theme</th>
                                        <th>PHP</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($configurations as $configuration)
                                        <tr>
											<td>{{ $configuration->web_name}}</td>
                                            <td>{{ $configuration->admin_email}}</td>
											<td>{{ $configuration->theme}}</td>
                                            <td>{{ $configuration->php}}</td>
                                            
                                            @if ( $configuration->status == 'LOADING')
                                            <td><i class="fa fa-spinner" aria-hidden="true"></i></td>
                                            @elseif ( $configuration->status == 'READY')
                                            <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                                            @elseif ( $configuration->status == 'PAUSED')
                                            <td><i class="fa fa-pause" aria-hidden="true"></i></td>
                                            @endif

                                            <td>
                                                
                                                    <a class="btn btn-sm btn-primary " href="http://localhost:{{$configuration->assigned_port}}" target="_blank"><i class="fa fa-fw fa-eye"></i> WordPress</a>
                                                    <a class="btn btn-sm btn-primary " href="http://localhost:{{$configuration->assigned_port+1}}" target="_blank"><i class="fa fa-fw fa-eye"></i> phpMyAdmin</a>

                                                    @if ( $configuration->status == 'READY')
                                                    <a class="btn btn-sm btn-success" href="download/{{ $configuration->web_name }}.zip"><i class="fa fa-fw fa-edit"></i> Download</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('configurations.stop', $configuration->id) }}"><i class="fa fa-fw fa-pause"></i> Stop</a>                                                    
                                                    @elseif ( $configuration->status == 'PAUSED')
                                                    <a class="btn btn-sm btn-success" href="download/{{ $configuration->web_name }}.zip"><i class="fa fa-fw fa-edit"></i> Download</a>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('configurations.start', $configuration->id) }}"><i class="fa fa-fw fa-play"></i> Start</a>
                                                    @endif  
                                                    <a class="btn btn-sm btn-danger" href="{{ route('configurations.destroy', $configuration->id) }}"><i class="fa fa-fw fa-trash"></i> Delete</a>                                             
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $configurations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection