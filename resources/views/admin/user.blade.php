@extends('admin/layout/master')

@section('content')

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
                                        <img src="{{ url('/user/default.png') }}" class="rounded-circle" style="width: 38px; height: 38px"></img>

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

@endsection