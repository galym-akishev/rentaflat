@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Details of the advertisement</h4>
                <div class="card">
{{--                    <img class="card-img-top" style="width: 3rem;" src="{{ Vite::asset('resources/images/favicon.png') }}" alt="Card image cap">--}}
                    <div class="card-body">
                        <p class="card-title"><b>Title:</b> {{ $advertisement->title }}</p>
                        <p class="card-text"><b>Description:</b> {{ $advertisement->description }}</p>
                        <div class="d-flex">
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
