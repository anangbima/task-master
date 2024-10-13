@extends('user/layout/master')

@section('content')

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-2 col-sm-12">
                
            </div>

            <div class="col-lg-8 col-sm-12">
                {{-- Detail Section --}}
                <div class="mb-5">
                    <h1>{{ $project->name }}</h1>

                    <div>
                        Created by. {{ $project->user->name }}
                    </div>

                    <div class="mt-5">
                        {{ $project->description }}
                    </div>
                </div>

                {{-- Tugas Section --}}
                <div class="mb-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Task</h5>

                        <div>
                            <a href="{{ route('tasks.create') }}" class="btn btn-outline-dark btn-sm">Add new</a>
                        </div>
                    </div>

                    <div class="row mt-3">
                        {{-- Not Started --}}
                        <div class="col-lg-4 col-sm-12 mb-3">
                            <div class="card shadow-sm border-0 bg-white">
                                <div class="card-body">
                                    <h6 class="card-title mt-2">
                                        Task 1
                                    </h6>
        
                                    <div class=mt-3>
                                        <span class="badge rounded-pill text-bg-danger">Deadline</span>
                                    </div>
                                </div>
        
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>

                        {{-- On Going --}}
                        <div class="col-lg-4 col-sm-12 mb-3">
                            <div class="card shadow-sm border-0 bg-white">
                                <div class="card-body">
                                    <h6 class="card-title mt-2">
                                        Task 1
                                    </h6>
        
                                    <div class=mt-3>
                                        <span class="badge rounded-pill text-bg-warning">Deadline</span>
                                    </div>
                                </div>
        
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>

                        {{-- Done --}}
                        <div class="col-lg-4 col-sm-12 mb-3">
                            <div class="card shadow-sm border-0 bg-white">
                                <div class="card-body">
                                    <h6 class="card-title mt-2">
                                        Task 1
                                    </h6>
        
                                    <div class=mt-3>
                                        <span class="badge rounded-pill text-bg-success">Deadline</span>
                                    </div>
                                </div>
        
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Member Section --}}
                <div class="mb-5">
                    <div class="mb-4">
                        <h5>Member</h5>
                    </div>

                    @foreach ($project->member as $member)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ url('/user/default.png') }}" class="rounded-circle" style="width:32px; height: 32px"></img>

                                <div>
                                    Nama User
                                </div>
                            </div>

                            <div class="fst-italic font-weight-light">
                                Add on {{ $member->created_at }}
                            </div>

                            <div>
                                <a href="#" class="btn btn-outline-danger btn-sm">Out</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection