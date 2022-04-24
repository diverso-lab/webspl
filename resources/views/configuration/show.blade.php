@extends('layouts.app')

@section('template_title')
    {{ $configuration->name ?? 'Show Configuration' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Configuration</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('configurations.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Website Name:</strong>
                            {{ $configuration->web_name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $configuration->admin_email }}
                        </div>
                        <div class="form-group">
                            <strong>Theme:</strong>
                            {{ $configuration->theme }}
                        </div>
                        <div class="form-group">
                            <strong>PHP:</strong>
                            {{ $configuration->php }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
