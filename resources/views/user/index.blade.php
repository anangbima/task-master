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

            <div class="mt-3">
                @forelse ($projects as $project)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6>{{ $project->name }}</h6>
                        </div>

                        <a href="{{ url('/projects/'.$project->slug) }}" class="stretched-link"></a>
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