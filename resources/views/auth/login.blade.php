@extends('auth/layout/master')

@section('content')

    <div class="position-relative w-100" style="height: 90vh">
        <div class="position-absolute top-50 start-50 translate-middle ">
            <div class="card " style="width: 480px">
                <div class="card-body">

                    @error('error')
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <span class="alert-inner--text"><strong>Warning!</strong>  {{ $message }}</span>
                        </div>
                    @enderror

                    <form class="mt-3" action="{{ route('proses-login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <input type="submit" value="Login" class="btn btn-primary w-100">
                        </div>
                    </form>

                    <div class="mt-3">
                        Don't have an account ? <a href="{{ route('registrasi') }}">Registrasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection