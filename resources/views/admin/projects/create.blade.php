@extends('admin/layout/master')

@section('content')

    <div class="container">
        <form action="{{ route('projects.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                <div class="invalid-feedback" value="{{ old('name') }}">
                    <i class="bx bx-radio-circle"></i>
                    @error('name')
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

            {{-- @foreach ($users as $user)
                <div>
                    <input type="checkbox" name="member[]" id="member" value="{{ $user->id }}">
                    <label for="member">{{ $user->name }}</label>
                </div>
            @endforeach --}}

            <div class="form-group">
                <label for="member">Member</label>
                <select class="choices form-select multiple-remove" id="member" name="member[]" multiple="multiple">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mt-3 ">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
@endsection