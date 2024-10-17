@extends('admin/layout/master')

@section('content')

    <div class="container">
        <form action="{{ route('tasks.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="">Description</label>
                <textarea id="editor" name="description" class="form-control @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            @foreach ($users as $user)
                <div>
                    <input type="checkbox" name="member[]" id="member" value="{{ $user->id }}">
                    <label for="member">{{ $user->name }}</label>
                </div>
            @endforeach
            
            <div class="mt-3 ">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>

@endsection