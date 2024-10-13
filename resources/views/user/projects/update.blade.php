@extends('user/layout/master')

@section('content')

    <div class="container mt-5 pt-5">
        <form action="{{ route('projects.update', $project) }}" method="post">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Project Name" autofocus value="{{ $project->name }}">
            </div>

            <div class="mb-3">
                <textarea class="form-control" name="description" id="description" rows="16">{{ $project->description }}</textarea>
            </div>

            <div class="d-flex flex-row-reverse mt-4">
                <input type="submit" class="btn btn-outline-dark" value="Update">
            </div>
        </form>
    </div>

@endsection