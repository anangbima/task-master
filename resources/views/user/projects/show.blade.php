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

            <div class="mt-3">
                @forelse ($project->task as $task)
                    <div class="card mb-3">
                        <div class="card-body">
                            <span class="fw-bold">{{ $task->title }}</span>

                            <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#detailTask"></a>

                            {{-- Modal detail task --}}
                            <div class="modal fade text-left modal-borderless" id="detailTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col-lg-8 col-sm-12" id="modal-content-left" style="background-color: #151521;">
                                                <div class="fw-light p-3" style="font-size: 14px">{{ $project->name }}</div>

                                                <div class="px-5 py-4">
                                                    <h4 class="">{{ $task->title }}</h4>

                                                    <div class="mt-4">
                                                        {!! $task->description !!}
                                                    </div>

                                                    <div class="mt-4 d-flex justify-content-between align-items-center">
                                                        <div>
                                                            Coments
                                                        </div>
                                                    </div>

                                                    <div class="mt-3">
                                                        <div style="font-size: 14px" class="fw-bold">
                                                            Admin, 20 Januari 2021
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body p-3">
                                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore voluptas totam accusamus perspiciatis necessitatibus eaque eius optio maiores ullam corporis?
                                                            </div>
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
                                                            <td>
                                                                <span class="badge text-bg-warning">{{ $task->status }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr height="40px">
                                                            <td>Priority</td>
                                                            <td>
                                                                <span class="badge text-bg-danger">{{ $task->priority }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr height="40px">
                                                            <td>Due date</td>
                                                            <td>
                                                                <div class="d-flex">

                                                                    <span>{{ $task->due_date }}</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="mt-3">
                                                        <div>
                                                            Member Involved
                                                        </div>

                                                        <div class="mt-3">
                                                            @foreach ($task->member as $member)
                                                                <div class="d-flex gap-2 align-items-center mb-3">
                                                                    <img src="{{ url('/user/default.png') }}" class="rounded-circle" style="width: 32px; height: 32px"></img>
                                                                    <span>
                                                                        {{ $member->user->name }}
                                                                    </span>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        </div>
    </div>

@endsection