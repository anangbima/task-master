@extends('admin/layout/master')

@section('content')

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Create New</a>

        <!-- Modal -->
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div> --}}

        <div>
            <input type="text" placeholder="Search" class="form-control">
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="fw-bold">
                Project 1
            </div>
        </div>
    </div>

@endsection