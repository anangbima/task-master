@extends('admin/layout/master')

@section('content')

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <a href="{{ route('projects.create') }}" class="btn btn-primary rounded">Create New</a>

        <div>
            <input type="text" placeholder="Search" class="form-control">
        </div>
    </div>
    
    @forelse ($projects as $project)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="fw-bold">
                        {{ $project->name }}
                    </div>

                    <div class="d-flex gap-2">
                        <a class="btn btn-success btn-sm" href="{{ route('projects.edit', $project) }}" style="z-index: 2;">Edit</a>
                        <form style="z-index: 2;" action="{{ route('projects.destroy', $project) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                        </form>
                    </div>
                </div>
            </div>

            <a href="{{ url('/admin/projects/'.$project->slug) }}" class="stretched-link"></a>
        </div>
    @empty
        <div class="w-100 position-relative" style="min-height: 600px">
            <div class="position-absolute top-50 start-50 translate-middle text-center">
                <h5>No Projects</h5>
                <div>There is no data available on this list yet.</div>
            </div>
        </div>
    @endforelse

    {{-- proses untuk mengambil pesan succes --}}
    @if (session()->get('success'))

        <div class="swal-success" data-swal="{{session()->get('success')}}"></div>

    @endif

    <script>
        $(document).ready(function(){

            const swalSuccess = $('.swal-success').data('swal');
            const message = $('.swal-success').attr('data-swal');

            if(swalSuccess){

                Swal2.fire({
                    icon: "success",
                    title: "Success",
                    text: message,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    </script>

@endsection