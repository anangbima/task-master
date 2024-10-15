@extends('user/layout/master')

@section('content')

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <div class="position-relative w-100 h-50">
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <div class="avatar bg-warning" style="width: 140px; height: 140px;">
                                    <div class="position-relative w-100">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <span class="avatar-content fw-bold" style="font-size: 52px;">{{ auth()->user()->initials }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="btn-group" role="group" aria-label="Default button group">
                                    <button type="button" class="btn btn-outline-primary px-3" data-bs-toggle="modal" data-bs-target="#updateImage">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-primary px-3">
                                        <i class="bi bi-trash2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-12">
                        <h6>Profile Information</h6>

                        <div class="mt-4">
                            <form action="#" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? auth()->user()->name }}">
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? auth()->user()->email }}">
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex flex-row-reverse mt-4">
                                    <input type="submit" value="Save Changes" class="btn btn-primary">
                                </div>
                            </form>
                        </div>

                        <div class="mt-4">
                            <form action="#" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="password_old">Password Old</label>
                                    <input type="password_old" id="password_old" name="password_old" class="form-control @error('password_old') is-invalid @enderror">
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        @error('password_old')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="password_new">Password New</label>
                                            <input type="password_new" id="password_new" name="password_new" class="form-control @error('password_new') is-invalid @enderror">
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                @error('password_new')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="password_confirmation">Password New Confirmation</label>
                                            <input type="password_confirmation" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                @error('password_confirmation')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-row-reverse mt-4">
                                    <input type="submit" value="Save Changes" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left modal-borderless" id="updateImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Image</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <form action="#" method="POST">
                    @csrf

                    <div class="modal-body">
                        <input id="image" name="image" type="file" class="image-preview-filepond mt-2 @error('image') is-invalid @enderror">
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            @error('image')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer" style="margin-top: -20px">
                        <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection