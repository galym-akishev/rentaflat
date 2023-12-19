@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-wrap">
                <h4 class="mt-2">Edit the advertisement</h4>
                <div class="border border-light-subtle rounded-2">
                    <form action="{{ route('advertisement.update', $advertisement->id) }}"
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
                        <button
                            type="submit"
                            class="btn btn-info mb-2 mt-4">
                            Update
                        </button>
                        <a
                            href="{{ route('advertisement.index') }}"
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
