@extends('admin/layout/master')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>User</td>
                                <td class="text-end">Created at</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            <div class="avatar bg-warning ms-2" style="width: 30px; height: 30px">
                                                {{ $user->imagePicture }}
                                            </div>

                                            <div>
                                                <div>
                                                    {{ $user->name }}
                                                </div>
                                                <div class="fw-lighter">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="fst-italic fw-lighter" style="font-size: 14px">
                                            {{ $user->created_at }}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection