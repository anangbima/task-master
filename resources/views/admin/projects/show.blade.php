@extends('admin/layout/master')

@section('content')

    <div class="mb-4">
        {!! $project->description !!}
    </div>

    <div class="mb-3 d-flex align-items-center justify-content-between">
        <h5>Task</h5>

        <div >
            <a href="#" class="btn btn-primary">Create new</a>
        </div>
    </div> 

    <section class="tasks">
        <div class="card widget-todo">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h4 class="card-title d-flex">
                    <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>Tasks
                </h4>
                <ul class="list-inline d-flex mb-0">
                    <li class="d-flex align-items-center">
                        <i class="bx bx-check-circle font-medium-3 me-50"></i>
                        <div class="dropdown">
                            <div class="dropdown-toggle me-1" role="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Task
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Option 1</a>
                                <a class="dropdown-item" href="#">Option 2</a>
                                <a class="dropdown-item" href="#">Option 3</a>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="bx bx-sort me-50 font-medium-3"></i>
                        <div class="dropdown">
                            <div class="dropdown-toggle" role="button" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Task
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#">Option 1</a>
                                <a class="dropdown-item" href="#">Option 2</a>
                                <a class="dropdown-item" href="#">Option 3</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        
            <div class="card-body px-0 py-1 overflow-auto">
                <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                    <li class="widget-todo-item">
                        <div
                            class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                            <div class="widget-todo-title-area d-flex align-items-center gap-2">
                                <i data-feather="list" class="cursor-move"></i>
                                <div class="checkbox checkbox-shadow">
                                    <input type="checkbox" class="form-check-input" id="checkbox-1">
                                </div>
                                <label for="checkbox-1" class="widget-todo-title ms-2">Add SCSS and JS files if
                                    required</label>
                            </div>
                            <div class="widget-todo-item-action d-flex align-items-center">
                                <div class="badge badge-pill bg-light-success me-1">frontend</div>
                                <div class="avatar bg-warning">
                                    <img src="./assets/compiled/jpg/1.jpg" alt="" srcset="">
                                </div>
                                <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                            </div>
                        </div>
                    </li>
                    <li class="widget-todo-item">
                        <div
                            class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                            <div class="widget-todo-title-area d-flex align-items-center gap-2">
                                <i data-feather="list" class="cursor-move"></i>
                                <div class="checkbox checkbox-shadow">
                                    <input type="checkbox" class="form-check-input" id="checkbox-2">
                                </div>
                                <label for="checkbox-2" class="widget-todo-title ms-2">Check all the changes that you did,
                                    before you commit</label>
                            </div>
                            <div class="widget-todo-item-action d-flex align-items-center">
                                <div class="badge badge-pill bg-light-danger me-1">backend</div>
                                <div class="avatar bg-warning">
                                    <img src="./assets/compiled/jpg/2.jpg" alt="" srcset="">
                                </div>
                                <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                            </div>
                        </div>
                    </li>
                    <li class="widget-todo-item completed">
                        <div
                            class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                            <div class="widget-todo-title-area d-flex align-items-center gap-2">
                                <i data-feather="list" class="cursor-move"></i>
                                <div class="checkbox checkbox-shadow">
                                    <input type="checkbox" class="form-check-input" id="checkbox-3" checked>
                                </div>
                                <label for="checkbox-3" class="widget-todo-title ms-2">Dribble, Behance, UpLabs & Pinterest
                                    Post</label>
                            </div>
                            <div class="widget-todo-item-action d-flex align-items-center">
                                <div class="badge badge-pill bg-light-primary me-1">UI/UX</div>
                                <div class="avatar bg-rgba-primary m-0 me-50">
                                    <img src="./assets/compiled/jpg/3.jpg" alt="" srcset="">
                                </div>
                                <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                            </div>
                        </div>
                    </li>
                    <li class="widget-todo-item">
                        <div
                            class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                            <div class="widget-todo-title-area d-flex align-items-center gap-2">
                                <i data-feather="list" class="cursor-move"></i>
                                <div class="checkbox checkbox-shadow">
                                    <input type="checkbox" class="form-check-input" id="checkbox-4">
                                </div>
                                <label for="checkbox-4" class="widget-todo-title ms-2">Fresh Design Web & Responsive
                                    Miracle</label>
                            </div>
                            <div class="widget-todo-item-action d-flex align-items-center">
                                <div class="badge badge-pill bg-light-info me-1">Design</div>
                                <div class="avatar bg-warning">
                                    <img src="./assets/compiled/jpg/4.jpg" alt="" srcset="">
                                </div>
                                <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                            </div>
                        </div>
                    </li>
                    <li class="widget-todo-item">
                        <div
                            class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                            <div class="widget-todo-title-area d-flex align-items-center gap-2">
                                <i data-feather="list" class="cursor-move"></i>
                                <div class="checkbox checkbox-shadow">
                                    <input type="checkbox" class="form-check-input" id="checkbox-5">
                                </div>
                                <label for="checkbox-5" class="widget-todo-title ms-2">Add Calendar page and source and
                                    credit page in
                                    documentation</label>
                            </div>
                            <div class="widget-todo-item-action d-flex align-items-center">
                                <div class="badge badge-pill bg-light-warning me-1">Javascript</div>
                                <div class="avatar bg-warning">
                                    <img src="./assets/compiled/jpg/5.jpg" alt="" srcset="">
                                </div>
                                <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                            </div>
                        </div>
                    </li>
                    <li class="widget-todo-item">
                        <div
                            class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                            <div class="widget-todo-title-area d-flex align-items-center gap-2">
                                <i data-feather="list" class="cursor-move"></i>
                                <div class="checkbox checkbox-shadow">
                                    <input type="checkbox" class="form-check-input" id="checkbox-6">
                                </div>
                                <label for="checkbox-6" class="widget-todo-title ms-2">Add Angular Starter-kit</label>
                            </div>
                            <div class="widget-todo-item-action d-flex align-items-center">
                                <div class="badge badge-pill bg-light-primary me-1">UI/UX</div>
                                <div class="avatar bg-warning">
                                    <img src="./assets/compiled/jpg/1.jpg" alt="" srcset="">
                                </div>
                                <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    {{-- <div class="row">
        <div class="col-lg-4 col-sm-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6>Task 1</h6>

                    <div class="progress progress-sm mt-3" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-success" style="width: 25%"></div>
                    </div>

                    <div class="mt-4 d-flex justify-content-between align-items-center">
                        <div>
                            <span class="badge rounded-pill text-bg-danger text-sm px-2" style="font-size: 12px">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="bi bi-calendar2-event"></i> 10 Oct 2025
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
                </div>
            </div>   
        </div>
    </div> --}}

    <div class="mb-3 d-flex align-items-center justify-content-between">
        <h5>Member</h5>

        <div>
            <a href="#" class="btn btn-primary">Add</a>
        </div>
    </div> 

    <div class="mb-3 card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{ url('/user/default.png') }}" class="rounded-circle" style="width:32px; height: 32px"></img>

                    <div>
                        Nama User
                    </div>
                </div>

                <div class="fst-italic font-weight-light">
                    Add on 
                </div>

                <div>
                    <a href="#" class="btn btn-outline-danger btn-sm">Remove</a>
                </div>
            </div>
        </div>
    </div>

@endsection