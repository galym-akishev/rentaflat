@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-wrap">
                <h4 class="mt-2">Create a new advertisement</h4>
                <div class="border border-light-subtle rounded-2">
                    <div class="mx-3 mt-2">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="bg-info">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                    @error('files')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <form
                        action="{{ route('advertisement.store') }}"
                        method="post"
                        enctype="multipart/form-data"
                        class="mx-3">
                        @csrf
                        <div class="form-row mt-2">
                            <label for="title"><b>Title:</b></label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control"
                                placeholder=" "
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
                                required/>
                        </div>
                        <div class="form-row mt-2">
                            <label for="price"><b>Price:</b></label>
                            <input
                                type="text"
                                name="price"
                                id="price"
                                class="form-control"
                                placeholder=" "
                                required/>
                        </div>
                        <div class="form-row mt-2">
                            <label for="amenities"><b>Amenities:</b></label>
                            @if(count($amenities)>0)
                                @foreach($amenities as $amenity)
                                    <div class="form-check">
                                        <input class="form-check-input" name="amenities[]" type="checkbox"
                                               value="{{ $amenity->id }}" id="checkbox-id-{{ $amenity->id }}">
                                        <label class="form-check-label" for="checkbox-id-{{ $amenity->id }}">
                                            {{ $amenity->title }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                No amenities to choose from.
                            @endif
                        </div>
                        <div class="mt-2">
                            <label class="form-label"><b>Select Files:</b></label>
                            <input type="file" name="files[]" multiple
                                   class="form-control @error('files') is-invalid @enderror">
                            @error('files')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button
                            type="submit"
                            class="btn btn-info mb-2 mt-4">
                            Create
                        </button>
                        <a
                            href="{{ route('advertisement.index') }}"
                            class="btn btn-info mb-2 mt-4">
                            Back
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
