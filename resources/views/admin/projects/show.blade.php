@extends('admin/layout/master')

@section('content')

    <div class="mb-4">
        {!! $project->description !!}
    </div>

    <div class="mb-3 d-flex align-items-center justify-content-between">
        <h5>Task</h5>

        <div >
            {{-- <a href="{{ route('tasks.create') }}" class="btn btn-primary" >Create new</a> --}}
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTask">Create new</a>
        </div>
    </div> 

    <div class="row">
        @forelse ($project->task as $task)
            <div class="col-lg-4 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $task->title }}</h5>

                        <div class="progress progress-sm mt-3" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-success" style="width: 25%"></div>
                        </div>

                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge rounded-pill text-bg-danger text-sm px-2" style="font-size: 12px">
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="bi bi-calendar2-event"></i> 
                                    </div>
                                </span>
                            </div>
        
                            <div class="d-flex">
                                <div style="margin-left: -10px">
                                    <img src="{{ url('/user/default.png') }}" class="rounded-circle" style="width: 24px; height: 24px"></img>
                                </div>
                                <div style="margin-left: -10px">
                                    <img src="{{ url('/user/default.png') }}" class="rounded-circle" style="width: 24px; height: 24px"></img>
                                </div>
                                <div style="margin-left: -10px">
                                    <img src="{{ url('/user/default.png') }}" class="rounded-circle" style="width: 24px; height: 24px"></img>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="d-flex mt-3 gap-2">
                            <a class="btn btn-success btn-sm" href="{{ route('tasks.edit', $task) }}" style="z-index: 2;">Edit</a>
                            <form style="z-index: 2;" action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                            </form>
                        </div> --}}
                    </div>
                </div>   
            </div>
        @empty
            <div class="w-100 position-relative" style="min-height: 500px">
                <div class="position-absolute top-50 start-50 translate-middle text-center">
                    <h5>No Tasks</h5>
                    <div>There is no task available on this list yet.</div>
                </div>
            </div>
        @endforelse
    </div>

    <div class="mb-3 d-flex align-items-center justify-content-between">
        <h5>Member</h5>

        <div>
            <a href="#" class="btn btn-primary" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#addMember">Add</a>
        </div>

        <div class="modal fade text-left modal-borderless" id="addMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Member</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    <form action="{{ route('member-project.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            @foreach ($users as $user)
                                <div>
                                    <input type="checkbox" name="user_id[]" id="member" value="{{ $user->id }}">
                                    <label for="member">{{ $user->name }}</label>
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            {{-- <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Accept</span>
                            </button> --}}
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 

    <div class="mb-3 card">
        <div class="card-body">
            @forelse ($project->member as $member)
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ url('/user/default.png') }}" class="rounded-circle" style="width:32px; height: 32px"></img>

                        <div>
                            {{ $member->user->name }}
                        </div>
                    </div>

                    <div class="fst-italic font-weight-light">
                        Add on {{ $member->created_at}}
                    </div>

                    <div>
                        <form style="z-index: 2;" action="{{ route('member-project.destroy', $member) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger btn-sm" type="submit" value="Remove">
                        </form>
                    </div>
                </div>
            @empty
                <div class="w-100 position-relative" style="min-height: 400px">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h5>No Members</h5>
                        <div>There is no data available on this list yet.</div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Modal tambah task --}}
    <div class="modal fade text-left modal-borderless" id="createTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create new task</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="priority">Priority</label>
                            <select name="priority" id="priority" class="form-select @error('priority') is-invalid @enderror">
                                <option value=""></option>
                                <option value="High">High</option>
                                <option value="High">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('priority')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-lg-6 col-sm-12">
                                <label for="due_date">Due Date</label>
                                <input type="date" id="due_date" name="due_date" class="form-control @error('due_date') is-invalid @enderror" value="{{ old('due_date') }}">
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    @error('due_date')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <label for="due_hour">Due Hour</label>
                                <input type="time" id="due_hour" name="due_hour" class="form-control @error('due_hour') is-invalid @enderror" value="{{ old('due_hour') }}">
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    @error('due_hour')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="editor">Description</label>
                            <textarea id="editor" name="description" class="form-control @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        @foreach ($users as $user)
                            <div>
                                <input type="checkbox" name="member[]" id="member" value="{{ $user->id }}">
                                <label for="member">{{ $user->name }}</label>
                            </div>
                        @endforeach

                    </div>

                    <div class="modal-footer" style="margin-top: -10px">
                        <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>
            </div>
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

@endsection