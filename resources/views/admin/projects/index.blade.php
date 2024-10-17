@extends('admin/layout/master')

@section('content')

    <div class="container">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <a href="{{ route('projects.create') }}" class="btn btn-primary rounded">Create New</a>

            <div>
                <input type="text" placeholder="Search" class="form-control">
            </div>
        </div>
        
        <div class="row">
            @forelse ($projects as $project)
                <div class="col-lg-6 col-sm-12 mb-2">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5>{{ $project->name }}</h5>
                                
                                <div class="dropdown" style="z-index: 2;">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('projects.edit', $project) }}">Edit</a></li>
                                        <li><a class="dropdown-item text-danger" id="btn-delete" data-project="{{ $project }}" href="#">Remove</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-4 d-flex align-items-center justify-content-between">
                                <div>
                                    Progress
                                </div>

                                <div>
                                    {{ $project->statusTasks('Done')['percent'] }} %
                                </div>
                            </div>

                            <div class="mt-2">
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 6px">
                                    <div class="progress-bar bg-success " style="width: {{ $project->statusTasks('Done')['percent'] }}%"></div>
                                </div>
                            </div>

                            <div class="mt-4 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">

                                    <div>
                                        Tasks ({{ $project->statusTasks('Done')['count'] }}/{{ count($project->task) }})
                                    </div>
                                </div>

                                <div>
                                    @foreach ($project->member as $member)
                                        <div class="avatar bg-warning" style="width: 26px; height: 26px; margin-left: -10px; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">
                                            {{ $member->user->imagePicture }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <a href="{{ url('/admin/projects/'.$project->slug) }}" class="stretched-link"></a>
                    </div>
                </div>      
            @empty
                <div class="w-100 position-relative" style="min-height: 600px">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h5>No Projects</h5>
                        <div>There is no data available on this list yet.</div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

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

    <script>
        $(document).on("click", "#btn-delete", function() {
            var project = $(this).attr('data-project');
            var projectJson = $.parseJSON(project);
            
            Swal2.fire({
                icon: "question",
                title: "Delete Project ?",
                showConfirmButton: false,
                html: '<form action="{{ url("admin/projects/") }}/'+projectJson.slug+'" method="post">'+
                        '@method("DELETE")'+
                        '@csrf'+
                        '<button type="submit" class="btn btn-primary text-white mt-4 p-2">Hapus</button>'+
                    '</form>'
            })

        });
    </script>

@endsection