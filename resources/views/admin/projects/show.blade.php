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

    <div id="data-view" class="row">
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
                        
                        <a 
                            href="#" 
                            class="stretched-link" 
                            id="btn-detail-task" 
                            data-task="{{ $task }}" 
                            data-member="{{ $task->member->map(fn($q) => collect([ 'user' => $q->user, 'member' => $q])) }}"
                            data-coment="{{ $task->coment }}"
                        ></a>

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

                        @foreach ($project->member as $member)
                            <div>
                                <input type="checkbox" name="member[]" id="member" value="{{ $member->user->id }}">
                                <label for="member">{{ $member->user->name }}</label>
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

    {{-- Modal detail task --}}
    <div class="modal fade text-left modal-borderless" id="detailTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="row">
                    <div class="col-lg-8 col-sm-12" id="modal-content-left" style="background-color: #151521;">
                        <div class="fw-light p-3" style="font-size: 14px">{{ $project->name }}</div>

                        <div class="px-5 py-4">
                            <h4 id="title-view">
                                Title task
                            </h4>

                            <div id="description-view" class="mt-4">
                                Description task
                            </div>

                            <div class="mt-5 d-flex justify-content-between align-items-center">
                                <div>
                                    Coments
                                </div>
                            </div>

                            <div class="mt-3">
                                <form action="{{ route('coments.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-11">
                                            <input type="hidden" name="task_id" id="task-id" value="">
                                            <textarea class="form-control" name="content" id="" cols="10" rows="2"></textarea>
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" class="btn btn-primary btn-sm" value="Send">
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>

                            <div class="mt-4">
                                <div id="coment-view">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="d-flex flex-row-reverse p-3">
                            <button type="button" class="rounded-circle btn btn-sm btn-outline-primary" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="px-4 py-3">
                            <table class="w-100">
                                <tr height="40px">
                                    <td>Status</td>
                                    <td >
                                        <div id="status-view">
                                            Status task
                                        </div>
                                    </td>
                                </tr>
                                <tr height="40px">
                                    <td>Priority</td>
                                    <td>
                                        <div id="priority-view">
                                            Priority task
                                        </div>
                                    </td>
                                </tr>
                                <tr height="40px">
                                    <td>Due date</td>
                                    <td>
                                        <div class="d-flex">
                                            <div id="due-view">

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="mt-3">
                                <div class="fw-bold">
                                    Member Involved
                                </div>

                                <div class="mt-3" id="member-view">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <script>
        $(document).ready(function () {
            $('#data-view').on('click', '#btn-detail-task', function() {
                var task = $(this).attr('data-task');
                var taskMember = $(this).attr('data-member');
                var taskComent = $(this).attr('data-coment');

                var taskJson = $.parseJSON(task);
                var taskMemberJson = $.parseJSON(taskMember);
                var taskComentJson = $.parseJSON(taskComent);
                
                $('#title-view').html(taskJson.title);
                $('#task-id').val(taskJson.id);
                $('#description-view').html(taskJson.description);
                $('#status-view').html(showStatus(taskJson.status));
                $('#priority-view').html(showPriority(taskJson.priority));
                $('#due-view').html('<i class="bi bi-calendar2"></i> ' + taskJson.due_date +' '+taskJson.due_hour);

                showDataComent(taskComentJson);
                showDataMember(taskMemberJson);

                $('#detailTask').modal('show');
            })

            // Menampilkan status pada modal detail tasks
            function showStatus(status) {
                var htmlStatus = '';
                var statusColor = '';
                var statusValue = [];

                if (status == 'Not Started') {
                    statusColor = 'text-bg-danger';
                    statusValue = [
                        'In Progress',
                        'Done',
                    ]
                }
                if (status == 'In Progress') {
                    statusColor = 'text-bg-warning';
                    statusValue = [
                        'Not Started',
                        'Done',
                    ]
                }
                if (status == 'Done') {
                    statusColor = 'text-bg-success';
                    statusValue = [
                        'In Progress',
                        'Not Started',
                    ]
                }

                htmlStatus = '<div class="dropdown">'
                                    + '<div class="badge '+ statusColor +' dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">'
                                    + status 
                                    + '</div>'
                                    + '<ul class="dropdown-menu" id="dropdown-status">'
                                    +   '<li><a href="#" class="dropdown-item" id="btn-update-status" status-value="'+statusValue[0]+'">'+statusValue[0]+'</a></li>'
                                    +   '<li><a href="#" class="dropdown-item" id="btn-update-status" status-value="'+statusValue[1]+'">'+statusValue[1]+'</a></li>'
                                    + '</ul>'

                return htmlStatus
            }

            // Menampilkan priority pada modal detail task
            function showPriority(priority) {
                var htmlPriority = '';
                var priorityColor = '';
                
                if (priority == 'High') {
                    priorityColor = 'text-bg-danger'
                }
                if (priority == 'Medium') {
                    priorityColor = 'text-bg-warning'
                }
                if (priority == 'Low') {
                    priorityColor = 'text-bg-success'
                }

                htmlPriority = '<span class="badge '+priorityColor+'">'+priority+'</span>'

                return htmlPriority
            }

            // Menampilkan coment 
            function showDataComent(coments) {
                var htmlComent = '';

                if (coments.length == 0) {
                    htmlComent = '<div class="w-100 position-relative" style="min-height: 100px">'
                                    + '<div class="position-absolute top-50 start-50 translate-middle text-center">'
                                    +   '<div>There is no coment yet.</div>'
                                    + '</div>'
                                    + '</div>'
                }else{
                    
                    for (var index = 0; index < coments.length; index++) {
                        htmlComent = htmlComent + '<div style="font-size: 12px" class="fw-bold">'
                                                +   coments[index].created_at
                                                + '</div>'
                                                + '<div class="card">'
                                                +   '<div class="card-body p-3">'
                                                +       coments[index].content
                                                +   '</div>'
                                                + '</div>'
                    }
                }
                

                $('#coment-view').html(htmlComent);
            }

            // Menampilkan data member dari task
            function showDataMember(members){
                var htmlMember = '';

                for (var index = 0; index < members.length; index++) {
                    htmlMember = htmlMember + '<div class="d-flex gap-2 align-items-center mb-3">'
                                            +       '<img src="{{ url('/user/default.png') }}" class="rounded-circle" style="width: 32px; height: 32px"></img>'
                                            +       '<span>'
                                            +           members[index].user.name
                                            +       '</span>'
                                            +   '</div>'
                }

                $('#member-view').html(htmlMember);
            }
            
            // click update status task
            // $('#status-view').on('click', '.dropdown-item',function(e) {
            //     var status = $(this).attr('status-value');
                
            // })
        });
    </script>

@endsection