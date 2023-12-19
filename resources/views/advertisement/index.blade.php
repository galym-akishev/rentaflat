@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Listing of advertisements</h4>
                @if(count($advertisements)>0)
                    <ul class="list-group my-2">
                        @foreach ($advertisements as $advertisement)
                            <li class="list-group-item flex-column justify-content-between align-items-center border border-light-subtle">
                                <div class="fw-bold">{{ $advertisement->title }}</div>
                                <div class="opacity-50">
                                    <small>
                                        <a
                                            class="link-info link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                                            href="{{ route('advertisement.show', $advertisement->id) }}">
                                            [Details of ID: {{ $advertisement->id }}]
                                        </a>
                                    </small>
                                </div>
                                <div>
                                    {{ $advertisement->description }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    No advertisements yet.
                @endif

            </div>
        </div>
    </div>
@endsection
