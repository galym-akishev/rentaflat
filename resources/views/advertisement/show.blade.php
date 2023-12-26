@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Details of the advertisement</h4>

                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <b>Title:</b> {{ $advertisement->title }}
                        </div>
                        <div class="card-text">
                            <b>Owner:</b> {{ $advertisementOwner }}
                        </div>
                        @if(count($files)>0)
                            <div id="carouselControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($files as $file)
                                        @if ($loop->first)
                                            <div class="carousel-item active">
                                                <img class="d-block mx-auto" height="200" src="{{ Vite::asset('public/uploads/'. $file->name) }}" alt="{{ $file->name }}">
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <img class="d-block mx-auto" height="200" src="{{ Vite::asset('public/uploads/'. $file->name) }}" alt="{{ $file->name }}">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselControls" role="button" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon text-bg-info opacity-50" aria-hidden="true"></span>
                                </a>
                                <a class="carousel-control-next" href="#carouselControls" role="button" data-bs-slide="next">
                                    <span class="carousel-control-next-icon text-bg-info opacity-50" aria-hidden="true"></span>
                                </a>
                            </div>
                        @endif
                        <div class="card-text">
                            <b>Description:</b>
                            {{ $advertisement->description }}
                        </div>
                        <div class="card-text">
                            <b>Amenities:</b>
                            @if(count($amenities)>0)
                                <ul class="mb-0">
                                    @foreach($amenities as $amenity)
                                        <li>{{ $amenity->title }}</li>
                                    @endforeach
                                </ul>
                            @else
                                No amenities available.
                            @endif
                        </div>
                        <div class="card-text">
                            <b>Price:</b>
                            {{ $advertisement->price }}
                        </div>
                        <div class="card-text">
                            <b>Phone:</b>
                            {{ $advertisement->phone }}
                        </div>
                        <div class="d-flex mt-4">
                            <a
                                href="{{ route('advertisement.edit', $advertisement->id) }}"
                                class="btn btn-info mb-1 me-1">
                                Edit
                            </a>
                            <form action="{{ route('advertisement.delete', $advertisement->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input
                                    type="submit"
                                    class="btn btn-info mb-1 me-1"
                                    value="Delete">
                            </form>
                            <a
                                href="{{ route('advertisement.index') }}"
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
