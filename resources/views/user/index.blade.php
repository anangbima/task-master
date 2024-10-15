@extends('user/layout/master')

@section('content')

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>

        <h4>Projects</h4>

        <div class="mt-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ut, numquam expedita minus dolores enim itaque facere ratione at similique accusantium deserunt? Omnis, aliquid non. Officia quasi iusto accusamus itaque ipsa quia voluptates rem veniam dolore illum. Dolorem consequatur, itaque, aut minima voluptatum atque doloribus ratione nisi quos, voluptates temporibus!
        </div>

        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Your Projects</h5>

                <div>
                    <input type="text" placeholder="Search" class="form-control">
                </div>
            </div>

            <div class="mt-3 row">
                @forelse ($projects as $project)
                    <div class="col-lg-6 col-sm-12 mb-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6>{{ $project->name }}</h6>
    
                                <div class="mt-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        Progress
                                    </div>
    
                                    <div>
                                        25%
                                    </div>
                                </div>
    
                                <div class="mt-2">
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 6px">
                                        <div class="progress-bar bg-success " style="width: 25%"></div>
                                    </div>
                                </div>
    
                                <div class="mt-4 d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        {{-- <div class="bg-primary fw-small px-3 py-1 rounded-pill">
                                            <i class="bi bi-calendar2"></i> 12 Maret 2025
                                        </div> --}}
    
                                        <span class="badge rounded-pill text-bg-primary"><i class="bi bi-calendar2"></i> 12 Maret 2025</span>
    
                                        <div>
                                            Tasks (2/10)
                                        </div>
                                    </div>
    
                                    <div>
                                        <img src="{{ url('/user/default.png') }}" class="rounded-circle shadow-lg" style="width: 24px; height: 24px; margin-left: -10px"></img>
                                        <img src="{{ url('/user/default.png') }}" class="rounded-circle shadow-lg" style="width: 24px; height: 24px; margin-left: -10px"></img>
                                        <img src="{{ url('/user/default.png') }}" class="rounded-circle shadow-lg" style="width: 24px; height: 24px; margin-left: -10px"></img>
                                        <img src="{{ url('/user/default.png') }}" class="rounded-circle shadow-lg" style="width: 24px; height: 24px; margin-left: -10px"></img>
                                        <img src="{{ url('/user/default.png') }}" class="rounded-circle shadow-lg" style="width: 24px; height: 24px; margin-left: -10px"></img>
                                    </div>
                                </div>
                            </div>
    
                            <a href="{{ url('/projects/'.$project->slug) }}" class="stretched-link"></a>
                        </div>
                    </div>                    
                @empty
                    <div class="w-100 position-relative" style="min-height: 500px">
                        <div class="position-absolute top-50 start-50 translate-middle text-center">
                            <h5>No Projects</h5>
                            <div>It seems you don't have any projects yet</div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>    

@endsection