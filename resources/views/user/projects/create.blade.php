@extends('user/layout/master')

@section('content')

    <div class="container mt-5 pt-5">
        <form action="{{ route('projects.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Project Name" autofocus>
            </div>

            <div class="mb-3">
                <textarea class="form-control" name="description" id="description" rows="16"></textarea>
            </div>

            {{-- list user --}}
            <div class="mb-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="member[]" value="2">
                    <label class="form-check-label" for="inlineCheckbox1">User 2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="member[]" value="3">
                    <label class="form-check-label" for="inlineCheckbox1">User 3</label>
                </div>
            </div>

            <div class="d-flex flex-row-reverse mt-4">
                <input type="submit" class="btn btn-outline-dark" value="Create">
            </div>
        </form>
    </div>

@endsection