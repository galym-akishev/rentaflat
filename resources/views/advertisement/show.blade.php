@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Details of the advertisement</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title"><b>Title:</b> {{ $advertisement->title }}</div>
                        <div class="card-text"><b>Description:</b> {{ $advertisement->description }}</div>
                        <div class="card-text">
                            <b>Amenities:</b>
                            <ul>
                                @foreach($amenities as $amenity)
                                    <li>{{ $amenity->title }}</li>
                                @endforeach
                            </ul>
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
