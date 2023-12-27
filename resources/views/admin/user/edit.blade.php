@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-wrap">
                <h4 class="mt-2">Edit user's role</h4>
                <div class="border border-light-subtle rounded-2">
                    <div class="mx-3 mt-2">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="bg-info">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                    <form action="{{ route('admin.user.update', $user) }}"
                          method="post"
                          enctype="multipart/form-data"
                          class="mx-3">
                        @csrf
                        @method('patch')
                        <div class="form-row mt-2">
                            <label for="name"><b>Name:</b></label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                placeholder=" "
                                value="{{ $user->name }}"
                                required/>
                        </div>
                        <div class="form-row mt-2">
                            <label for="role"><b>Role:</b></label>
                            <select id="role" name="role" class="form-select" aria-label="Roles">
                                @foreach($userRoleCases as $userRoleCase)
                                    <option
                                        @if($user->role===$userRoleCase)
                                            selected
                                        @endif
                                        value={{ $userRoleCase }}>
                                        {{ $userRoleCase }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button
                            type="submit"
                            class="btn btn-info mb-2 mt-4">
                            Update
                        </button>
                        <a
                            href="{{ route('admin.user.show', $user) }}"
                            class="btn btn-info mb-2 mt-4"
                        >
                            Back
                        </a>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
