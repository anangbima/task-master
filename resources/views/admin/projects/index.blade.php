@extends('admin/layout/master')

@section('content')

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create New</a>

        <div>
            <input type="text" placeholder="Search" class="form-control">
        </div>
    </div>
    
    @foreach ($projects as $project)
        <div class="card mb-3">
            <div class="card-body">
                <div class="fw-bold">
                    {{ $project->name }}
                </div>
            </div>

            <a href="{{ url('/admin/projects/'.$project->slug) }}" class="stretched-link"></a>
        </div>
    @endforeach

@endsection