@extends('admin/layout/master')

@section('content')

    <div>
        <form action="{{ route('projects.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="">Description</label>
                <textarea id="editor" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
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

            <input type="text" class="form-control" id="select-user">
            
            <div class="position-relative">
                <div class="card p-3 border rounded-1 position-absolute w-100" id="list-user">
                    
                </div>
            </div>
            
            <div class="mt-3 ">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            let users = {!! $users->toJson() !!}
            $('#list-user').hide();

            $('#select-user').on('change keyup', function() {
                let value = $(this).val();
                
                $('#list-user').show();

                let filterUser = users.filter(function(item) {
                    return item.name == value;
                })

                $.each(filterUser, function(index, item) {
                    $('#list-user').append('<li>' + item.name + '</li>');
                })
            })
        });
    </script>
</script>
@endsection