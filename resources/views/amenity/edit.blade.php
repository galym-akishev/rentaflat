@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-wrap">
                <h4 class="mt-2">Edit the amenity</h4>
                <div class="border border-light-subtle rounded-2">
                    <form action="{{ route('amenity.update', $amenity->id) }}"
                          method="post"
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
                                value="{{ $amenity->title }}"
                                required/>
                        </div>
                        <button
                            type="submit"
                            class="btn btn-info mb-2 mt-4">
                            Update
                        </button>
                        <a
                            href="{{ route('amenity.show', $amenity->id) }}"
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
