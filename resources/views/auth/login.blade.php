@extends('auth/layout/master')

@section('content')

    <div>
        <form class="mt-3" action="{{ route('proses-login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password">
            </div>

            <div class="mt-4">
                <input type="submit" value="Login" class="btn btn-dark w-100">
            </div>
        </form>

        <div class="mt-3">
            Don't have an account ? <a href="{{ route('registrasi') }}">Registrasi</a>
        </div>
    </div>

@endsection