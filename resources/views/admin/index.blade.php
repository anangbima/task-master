@extends('admin/layout/master')

@section('content')

    <div class="container">
        <div>
            {{ now()->format('d F Y') }}
        </div>
        <div>
            <h1>Welcome back, {{ auth()->user()->name }}</h1>
        </div>
        <div class="mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, exercitationem excepturi voluptatum neque repellendus libero pariatur molestias aliquid similique ipsa nihil nemo natus dolor eius optio soluta fugiat quaerat voluptatibus?
        </div>
        <div class="card mt-4">

        </div>
    </div>
    

@endsection