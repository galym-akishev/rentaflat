@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Amenities</h4>
                @if(count($users)>0)
                    <ul class="list-group my-2">
                        @foreach ($users as $user)
                            <li class="list-group-item flex-column justify-content-between align-items-center border border-light-subtle">
                                <div class="fw-bold">{{ $user->name }}</div>
                                <div class="opacity-50">
                                    <small>
                                        <a
                                            class="link-info link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                                            href="/">
                                            [Details of ID: {{ $user->id }}]
                                        </a>
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                @else
                    No amenities yet.
                @endif
            </div>
        </div>
    </div>
@endsection
