@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-wrap">
                <h4 class="mt-2">Create a new amenity</h4>
                <div class="border border-light-subtle rounded-2">
                    <form
                        action="{{ route('amenity.store') }}"
                        method="post"
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
                        <button
                            type="submit"
                            class="btn btn-info mb-2 mt-4">
                            Create
                        </button>
                        <a
                            href="{{ route('amenity.index') }}"
                            class="btn btn-info mb-2 mt-4">
                            Back
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
