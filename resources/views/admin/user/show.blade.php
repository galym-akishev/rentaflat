@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Details of the user</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <b>Name:</b> {{ $user->name }}
                        </div>
                        <div class="card-text">
                            <b>Email:</b> {{ $user->email }}
                        </div>
                        <div class="card-text">
                            <b>Role:</b>
                            {{ $user->role }}
                        </div>
                        <div class="card-text">
                            <b>Created at:</b>
                            {{ $user->created_at }}
                        </div>
                        <div class="card-text">
                            <b>Updated at:</b>
                            {{ $user->updated_at }}
                        </div>
                        <div class="d-flex mt-4">
                                <a
                                    href="{{ route('admin.user.edit', $user) }}"
                                    class="btn btn-info mb-1 me-1">
                                    Edit
                                </a>
                            <a
                                href="{{ route('admin.user.index') }}"
                                class="btn btn-info mb-1 me-1"
                            >
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
