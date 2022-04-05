@extends('layouts.app')

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
                                {{ __('Configuration') }}
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
                                        <th>No</th>

										<th>Name</th>
										<th>Template Type</th>
										<th>Security</th>
										<th>Performance</th>
										<th>Socials</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($configurations as $configuration)
                                        <tr>

											<td>{{ $configuration->name }}</td>
											<td>{{ $configuration->template_type }}</td>
											<td>{{ $configuration->security }}</td>
											<td>{{ $configuration->performance }}</td>
											<td>{{ $configuration->socials }}</td>

                                            <td>
                                                <form action="{{ route('configurations.destroy',$configuration->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('configurations.show',$configuration->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('configurations.edit',$configuration->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
