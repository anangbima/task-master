@extends('user/layout/master')

@section('content')

    <div class="container mt-5">
        <div>
            <h5>{{ $project->name }}</h5>
        </div>

        <div class="mt-4">
            {!! $project->description !!}
        </div>

        <div class="mt-5">
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
                            <span class="fw-bold">{{ $task->title }}</span>

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