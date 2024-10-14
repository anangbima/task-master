@extends('admin/layout/master')

@section('content')

    <div>
        <form action="{{ route('projects.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" >
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="mt-3">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>

@endsection