@extends('user/layout/master')

@section('content')

    {{-- versi baru --}}
    <div class=" mt-5" style="padding-left: 220px; padding-right: 220px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Project</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $project->name }}</li>
            </ol>
        </nav>
        
        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-about-tab" data-bs-toggle="pill"
                        href="#v-pills-about" role="tab" aria-controls="v-pills-about"
                        aria-selected="true">About</a>
                    <a class="nav-link" id="v-pills-summary-tab" data-bs-toggle="pill"
                        href="#v-pills-summary" role="tab" aria-controls="v-pills-summary"
                        aria-selected="false">Summary</a>
                    <a class="nav-link" id="v-pills-tasks-tab" data-bs-toggle="pill"
                        href="#v-pills-tasks" role="tab" aria-controls="v-pills-tasks"
                        aria-selected="false">Tasks</a>
                    <a class="nav-link" id="v-pills-other-tab" data-bs-toggle="pill"
                        href="#v-pills-other" role="tab" aria-controls="v-pills-other"
                        aria-selected="false">Other</a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-about" role="tabpanel"
                        aria-labelledby="v-pills-about-tab">

                        <div class="px-lg-5 px-sm-0">
                            <h2>{{ $project->name }}</h2>
                            <div class="fw-light" style="font-size: 14px">
                                Created by. Admin
                            </div>

                            <div class="mt-4">
                                {!! $project->description !!}
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-summary" role="tabpanel"
                        aria-labelledby="v-pills-summary-tab">

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="d-flex gap-4 align-items-center">
                                            <div class="">
                                                <div class="stats-icon red mb-2 position-relative">
                                                    <div class="position-absolute top-50 start-50 translate-middle">
                                                        <i class="bi bi-list-task"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <h6 class="text-muted font-semibold">Total Task</h6>
                                                <h4 class="font-extrabold mb-0">{{ count($project->task) }}</h4>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="d-flex gap-4 align-items-center">
                                            <div class="">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="">
                                                <h6 class="text-muted font-semibold">Member</h6>
                                                <h4 class="font-extrabold mb-0">{{ count($project->member) }}</h4>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="progress-stacked" >
                                    <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project->statusTasks('Done')['percent'] }}%">
                                        <div class="progress-bar bg-success">{{ intVal($project->statusTasks('Done')['percent']) }}%</div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project->statusTasks('In Progress')['percent'] }}%">
                                        <div class="progress-bar bg-warning">{{ intVal($project->statusTasks('In Progress')['percent']) }}%</div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Segment three" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project->statusTasks('Not Started')['percent'] }}%">
                                        <div class="progress-bar bg-danger">{{ intVal($project->statusTasks('Not Started')['percent']) }}%</div>
                                    </div>
                                </div>

                                <div class="mt-3 d-flex gap-3">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="bg-success rounded-circle" style="width: 12px; height: 12px;"></div>
                                        <div>
                                            Done
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="bg-warning rounded-circle" style="width: 12px; height: 12px;"></div>
                                        <div>
                                            In Progress
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="bg-danger rounded-circle" style="width: 12px; height: 12px;"></div>
                                        <div>
                                            Not Started
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-tasks" role="tabpanel"
                        aria-labelledby="v-pills-tasks-tab">
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Tasks</h6>
            
                            <div class="">
                                <input type="text" placeholder="Search" class="form-control">
                            </div>
                        </div>

                        <div id="data-view" class="mt-3">
                            @forelse ($project->task as $task)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-3">
                                                <div class="fw-bold">{{ ucfirst($task->title) }}</div>
                                            </div>
                                            <div class="col-3">
                                                <div class="d-flex gap-2 mt-1">
                                                    <span class="badge rounded text-bg-secondary">
                                                        {{ $task->due_date }}
                                                        {{ $task->due_hour }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                @if ($task->priority == 'High')
                                                    <div class="badge text-bg-danger">
                                                        {{ $task->priority }}
                                                    </div>
                                                @endif
                                                @if ($task->priority == 'Medium')
                                                    <div class="badge text-bg-warning">
                                                        {{ $task->priority }}
                                                    </div>
                                                @endif
                                                @if ($task->priority == 'Low')
                                                    <div class="badge text-bg-success">
                                                        {{ $task->priority }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-2">
                                                <div>
                                                    @if ($task->status == 'Not Started')
                                                        <div class="dropend" id="dropdown-status" style="z-index: 2;">
                                                            <div class="badge text-bg-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{ $task->status }}
                                                            </div>
                                                            <ul class="dropdown-menu" >
                                                                <li><a href="#" class="dropdown-item" id="btn-update-status" value-id="{{ $task->id }}" status-value="In Progress">In Progress</a></li>
                                                                <li><a href="#" class="dropdown-item" id="btn-update-status" value-id="{{ $task->id }}" status-value="Done">Done</a></li>
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if ($task->status == 'In Progress')
                                                        <div class="dropend" id="dropdown-status" style="z-index: 2;">
                                                            <div class="badge text-bg-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{ $task->status }}
                                                            </div>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#" class="dropdown-item" id="btn-update-status" value-id="{{ $task->id }}" status-value="Not Started">Not Started</a></li>
                                                                <li><a href="#" class="dropdown-item" id="btn-update-status" value-id="{{ $task->id }}" status-value="Done">Done</a></li>
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    @if ($task->status == 'Done')
                                                        <div class="dropend" id="dropdown-status" style="z-index: 2;" >
                                                            <div class="badge text-bg-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{ $task->status }}
                                                            </div>
                                                            <ul class="dropdown-menu" >
                                                                <li><a href="#" class="dropdown-item" id="btn-update-status" value-id="{{ $task->id }}" status-value="Not Started">Not Started</a></li>
                                                                <li><a href="#" class="dropdown-item" id="btn-update-status" value-id="{{ $task->id }}" status-value="In Progress">In Progress</a></li>
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                            <div class="col-2 text-end">
                                                @foreach ($task->member as $member)
                                                    <div class="avatar bg-warning" style="width: 26px; height: 26px; margin-left: -10px; box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px;">
                                                        {{ $member->user->imagePicture }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
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
                            @empty
                                <div class="w-100 position-relative" style="min-height: 500px">
                                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                                        <h5>No Tasks</h5>
                                        <div>There is no task available on this list yet.</div>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-other" role="tabpanel"
                        aria-labelledby="v-pills-other-tab">
                        <div class="px-lg-5 px-sm-0">
                            <div class="mb-5">
                                <h5>Other Information</h5>
                            </div>

                            <div class="mb-3">
                                <div class="fw-bold">Created at</div>
                                <div>{{ $project->created_at }}</div>
                            </div>
                            <div class="mb-3">
                                <div class="fw-bold">Updated at</div>
                                <div>{{ $project->updated_at }}</div>
                            </div>

                            <div class="card mt-5">
                                <div class="p-2">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th class="text-end">Added at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($project->member as $member)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="avatar bg-warning ms-2" style="width: 30px; height: 30px">
                                                                {{ $member->user->imagePicture }}
                                                            </div>
                                                            <div class="fw-bold">
                                                                {{ $member->user->name }} <span class="fw-normal">{{ $member->user->name == auth()->user()->name ? '(You)' : '' }}</span>
                                                                <div>{{ $member->user->email }}</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <div class="fw-light">
                                                            {{ $member->user->created_at }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <h6>Member</h6>

                <div class="mt-3">
                    @foreach ($project->member as $member)
                        <div class="mb-2 d-flex align-items-center gap-2">
                            <div class="avatar bg-warning ms-2" style="width: 30px; height: 30px">
                                {{ $member->user->imagePicture }}
                            </div>
                            <div class="fw-bold">
                                {{ $member->user->name }} <span class="fw-normal">{{ $member->user->name == auth()->user()->name ? '(You)' : '' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
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

    @if (session()->get('error'))
        <div class="swal-error" data-swal="{{session()->get('error')}}"></div>
    @endif

    <script>
        $(document).ready(function(){

            const swalSuccess = $('.swal-success').data('swal');
            const swalError = $('.swal-error').data('swal');
            const message = $('.swal-success').attr('data-swal');
            const messageError = $('.swal-error').attr('data-swal');

            if(swalSuccess){

                Swal2.fire({
                    icon: "success",
                    title: "Success",
                    text: message,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            
            if(swalError){

                Swal2.fire({
                    icon: "error",
                    title: "Error",
                    text: messageError,
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
                $('#description-view').html(taskJson.description);
                $('#status-view').html(showStatus(taskJson.status));
                $('#priority-view').html(showPriority(taskJson.priority));
                $('#due-view').html('<i class="bi bi-calendar2"></i> ' + taskJson.due_date +' '+taskJson.due_hour);

                showDataComent(taskComentJson);
                showDataMember(taskMemberJson);
                
                console.log(taskMemberJson);
                

                $('#detailTask').modal('show');
            })

            // Menampilkan status pada modal detail tasks
            function showStatus(status) {
                var htmlStatus = '';
                var statusColor = '';

                if (status == 'Not Started') {
                    statusColor = 'text-bg-danger';
                }
                if (status == 'In Progress') {
                    statusColor = 'text-bg-warning';
                }
                if (status == 'Done') {
                    statusColor = 'text-bg-success';
                }

                htmlStatus = '<div class="badge '+ statusColor +'">'
                                + status 
                                + '</div>'
                                    

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
                                            +       '<span>'
                                            +           members[index].user.name
                                            +       '</span>'
                                            +   '</div>'
                }

                $('#member-view').html(htmlMember);
            }
            
            // click update status task
            $(document).on('click', '#btn-update-status',function() {
                var status = $(this).attr('status-value');
                var id = $(this).attr('value-id');
                
                console.log(id);
                
                Swal2.fire({
                    icon: "question",
                    title: "Update Status Task",
                    showConfirmButton: false,
                    html: '<form action="{{ route("update-status-task") }}" method="post">'+
                            '@csrf'+
                            '<div>Are you sure want to update status task ?</div>'+
                            '<input type="hidden" name="id" value="'+id+'">'+
                            '<input type="hidden" name="status" value="'+status+'">'+
                            '<button type="submit" class="btn btn-primary text-white mt-4 p-2 px-4">Yes</button>'+
                        '</form>'
                })
            })
        });
    </script>

@endsection