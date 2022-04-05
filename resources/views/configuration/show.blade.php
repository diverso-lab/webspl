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
                            <strong>Name:</strong>
                            {{ $configuration->name }}
                        </div>
                        <div class="form-group">
                            <strong>Template Type:</strong>
                            {{ $configuration->template_type }}
                        </div>
                        <div class="form-group">
                            <strong>Security:</strong>
                            {{ $configuration->security }}
                        </div>
                        <div class="form-group">
                            <strong>Performance:</strong>
                            {{ $configuration->performance }}
                        </div>
                        <div class="form-group">
                            <strong>Socials:</strong>
                            {{ $configuration->socials }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
