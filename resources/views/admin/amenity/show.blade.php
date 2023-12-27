@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Details of the amenity</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <b>Title:</b> {{ $amenity->title }}
                        </div>
                        <div class="d-flex mt-4">
                            <a
                                href="{{ route('admin.amenity.edit', $amenity->id) }}"
                                class="btn btn-info mb-1 me-1">
                                Edit
                            </a>
                            <form action="{{ route('admin.amenity.delete', $amenity->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input
                                    type="submit"
                                    class="btn btn-info mb-1 me-1"
                                    value="Delete">
                            </form>
                            <a
                                href="{{ route('admin.amenity.index') }}"
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
