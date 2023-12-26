@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">All available amenities</h4>
                @if(count($amenities)>0)
                    <ul class="list-group my-2">
                        @foreach ($amenities as $amenity)
                            <li class="list-group-item flex-column justify-content-between align-items-center border border-light-subtle">
                                <div class="fw-bold">{{ $amenity->title }}</div>
                                <div class="opacity-50">
                                    <small>
                                        <a
                                            class="link-info link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                                            href="{{ route('amenity.show', $amenity->id) }}">
                                            @can('create', App\Models\Amenity::class)
                                                [Details of ID: {{ $amenity->id }}]
                                            @endcan
                                        </a>
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    No amenities yet.
                @endif

            </div>
        </div>
    </div>
@endsection
