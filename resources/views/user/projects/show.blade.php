@extends('user/layout/master')

@section('content')

    <div class="container mt-5">
        <div>
            <h5>{{ $project->name }}</h5>
        </div>

        <div class="mt-4">
            {!! $project->description !!}
        </div>

        <div class="mt-5">
            <h6>Tasks</h6>

            
        </div>
    </div>

@endsection