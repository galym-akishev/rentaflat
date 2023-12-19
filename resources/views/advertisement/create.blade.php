@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-wrap">
                <h1>Create a new advertisement:</h1>
                <form action="{{ route('advertisement.store') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <label for="title"><b>Title:</b></label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
                            placeholder=" "
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
                            required/>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-info mb-1 mt-2 me-1">
                        Create
                    </button>
                    <a
                        href="{{ route('advertisement.index') }}"
                        class="btn btn-info mb-1 mt-2 me-1">
                        Back
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
