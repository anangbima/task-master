@extends('admin/layout/master')

@section('content')

    <div class="container">
        <form action="{{ route('projects.update', $project) }}" method="post">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $project->name }}">
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="">Description</label>
                <textarea id="editor" name="description" class="form-control @error('description') is-invalid @enderror">
                    {{ $project->description }}
                </textarea>
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            
            <div class="mt-3 ">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>

@endsection