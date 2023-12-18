@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-wrap">
                <h1>Edit the advertisement:</h1>
                <form action="{{ route('advertisement.update', $advertisement->id) }}"
                      method="post">
                    @csrf
                    @method('patch')
                    <div class="form-row">
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
                    <div class="form-row">
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
                        class="btn btn-info mb-1 mt-2 me-1">
                        Update
                    </button>
                    <a
                        href="{{ route('advertisement.index') }}"
                        class="btn btn-info mb-1 mt-2 me-1"
                    >
                        Back
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
