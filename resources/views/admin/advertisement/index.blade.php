@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">All advertisements</h4>
                @if(count($advertisements)>0)
                    <ul class="list-group my-2">
                        @foreach ($advertisements as $advertisement)
                            <li class="list-group-item flex-column justify-content-between align-items-center border border-light-subtle">
                                <div class="fw-bold">
                                    <a
                                        class="link-info link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                                        href="{{ route('admin.advertisement.show', $advertisement->id) }}">
                                        {{ $advertisement->title }} [# {{ $advertisement->id }}]
                                    </a>
                                </div>
                                <div>
                                    {{ $advertisement->description }}
                                </div>
                                <div>
                                    <small>
                                        <b>Status:</b>
                                        @if($advertisement->published)
                                            <span class="bg-danger-subtle px-1">Published</span>
                                        @else
                                            <span class="bg-gray px-1">Not published</span>
                                        @endif
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        {{ $advertisements->links() }}
                    </div>
                @else
                    No advertisements yet.
                @endif
            </div>
        </div>
    </div>
@endsection
