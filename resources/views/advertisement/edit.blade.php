@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-wrap">
                <h4 class="mt-2">Edit the advertisement</h4>
                <div class="border border-light-subtle rounded-2">
                    <div class="mx-3 mt-2">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="bg-info">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                    <form action="{{ route('advertisement.update', $advertisement->id) }}"
                          method="post"
                          enctype="multipart/form-data"
                          class="mx-3">
                        @csrf
                        @method('patch')
                        <div class="form-row mt-2">
                            <label for="title"><b>Title:</b></label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control"
                                placeholder=" "
                                value="{{ $advertisement->title }}"
                                required/>
                        </div>
                        <div class="form-row mt-2">
                            <label for="description"><b>Description:</b></label>
                            <input
                                type="text"
                                name="description"
                                id="description"
                                class="form-control"
                                placeholder=" "
                                value="{{ $advertisement->description }}"
                                required/>
                        </div>
                        <div class="form-row mt-2">
                            <label for="amenities"><b>Amenities:</b></label>
                            @foreach($amenitiesAll as $amenityOption)
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        name="amenities[]"
                                        type="checkbox"
                                        value="{{ $amenityOption->id }}"
                                        id="checkbox-id-{{ $amenityOption->id }}"
                                        @if($amenitiesOfAdvertisement->contains($amenityOption))
                                            checked
                                        @endif >
                                    <label class="form-check-label" for="checkbox-id-{{ $amenityOption->id }}">
                                        {{ $amenityOption->title }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-row mt-2">
                            <label for="price"><b>Price:</b></label>
                            <input
                                type="text"
                                name="price"
                                id="price"
                                class="form-control"
                                placeholder=" "
                                value="{{ $advertisement->price }}"
                                required/>
                        </div>
                        <div class="mt-2">
                            <div>
                                <b>Currently Attached Files:</b>
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
                            </div>
                            <label class="form-label"><b>Select New Files to Update All of the Existing Files:</b></label>
                            <input type="file" name="files[]" multiple
                                   class="form-control @error('files') is-invalid @enderror">
                            @error('files')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button
                            type="submit"
                            class="btn btn-info mb-2 mt-4">
                            Update
                        </button>
                        <a
                            href="{{ route('advertisement.show', $advertisement->id) }}"
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
