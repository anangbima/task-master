@extends('user/layout/master')

@section('content')

    <div class="container mt-5 pt-5">
        <form action="{{ route('tasks.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
            </div>

            <div class="mb-3 row">
                <div class="col-lg-6 col-sm-12">
                    <input type="time" name="time" class="form-control">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <input type="date" name="date" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <textarea class="form-control" name="description" id="description" rows="16"></textarea>
            </div>

            <div class="d-flex flex-row-reverse mt-4">
                <input type="submit" class="btn btn-outline-dark" value="Create">
            </div>
        </form>
    </div>

@endsection