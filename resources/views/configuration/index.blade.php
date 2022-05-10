@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('template_title')
    Configuration
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
                                            @else
                                            <td><i class="fa fa-check-circle" aria-hidden="true"></i></td>
                                            @endif

                                            <td>
                                                <form action="{{ route('configurations.destroy',$configuration->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="http://localhost/" target="_blank"><i class="fa fa-fw fa-eye"></i> Go</a>
                                                    <a class="btn btn-sm btn-success" href="download/{{ $configuration->web_name }}.zip"><i class="fa fa-fw fa-edit"></i> Download</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
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