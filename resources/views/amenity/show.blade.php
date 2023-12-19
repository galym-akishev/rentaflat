@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Details of the amenity</h4>
                <div class="card">
                    <div class="card-body">
                        <p class="card-title"><b>Title:</b> {{ $amenity->title }}</p>
                        <div class="d-flex">
                            <a
                                href="{{ route('amenity.edit', $amenity->id) }}"
                                class="btn btn-info mb-1 me-1">
                                Edit
                            </a>
                            <form action="{{ route('amenity.delete', $amenity->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input
                                    type="submit"
                                    class="btn btn-info mb-1 me-1"
                                    value="Delete">
                            </form>
                            <a
                                href="{{ route('amenity.index') }}"
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
