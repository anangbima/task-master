@extends('auth/layout/master')

@section('content')

    <div>
        <form class="mt-3" action="{{ route('proses-registrasi') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
            </div>

            <div class="mt-4">
                <input type="submit" value="Registrasi" class="btn btn-dark w-100">
            </div>
        </form>

        <div class="mt-3">
            Already have an account ? <a href="{{ route('login') }}">Login</a>
        </div>
    </div>

@endsection