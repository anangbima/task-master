@extends('admin/layout/master')

@section('content')

    <div class="container">
        <form action="{{ route('tasks.update', $task) }}" method="post">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $task->title }}">
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
                    <option value="{{ $task->priority }}">{{ $task->priority }}</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
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
                    <input type="date" id="due_date" name="due_date" class="form-control @error('due_date') is-invalid @enderror" value="{{ $task->due_date }}">
                    <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        @error('due_date')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="due_hour">Due Hour</label>
                    <input type="time" id="due_hour" name="due_hour" class="form-control @error('due_hour') is-invalid @enderror" value="{{ $task->due_hour }}">
                    <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        @error('due_hour')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="">Description</label>
                <textarea id="editor" name="description" class="form-control @error('description') is-invalid @enderror">{!! $task->description !!}</textarea>
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- <div class="form-group" style="z-index: 2;">
                <label for="member">Member</label>
                <select class="choices form-select multiple-remove" id="member" name="member[]" multiple="multiple">
                    @foreach ($project->member as $member)
                        <option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
                    @endforeach
                </select>
            </div> --}}
            
            <div class="mt-3 ">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>

@endsection