@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <ul class="list-group my-2">
                @foreach ($advertisements as $advertisement)
                    <li class="list-group-item flex-column justify-content-between align-items-center">
                        <div>
                            <div class="fw-bold">{{ $advertisement->title }}</div>
                            <div class="opacity-50">
                                <small>
                                    <a
                                        class="link-info link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                                        href="{{ route('advertisement.show', $advertisement->id) }}">
                                        [Details]
                                    </a>
                                </small>
                                <small class="text-info">[id: {{ $advertisement->id }}]</small>
                            </div>
                        </div>
                        <div>
                            {{ $advertisement->description }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
