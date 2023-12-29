@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Listing of advertisements</h4>
                <form method="GET" action="{{ route('advertisement.index') }}">
                    <div class="col-sm-6 my-1">
                        <div class="form-group mt-1">
                            <label class="sr-only" for="title" hidden></label>
                            <input
                                type="text"
                                class="form-control opacity-50"
                                name="title"
                                id="title"
                                placeholder="Search in titles">
                        </div>
                        <div class="form-group mt-1" >
                            <label for="description" hidden></label>
                            <input type="text"
                                   class="form-control opacity-50"
                                   name="description"
                                   id="description"
                                   placeholder="Search in descriptions">
                        </div>
                        <div class="form-group mt-1" >
                            <label for="price" hidden></label>
                            <input type="text"
                                   class="form-control opacity-50"
                                   name="price"
                                   id="price"
                                   placeholder="Search in prices">
                        </div>
                        <div class="mt-2">
                            <input type="submit" class="btn bg-black p-2 opacity-50 text-white" value="Search" />
                        </div>
                    </div>
                </form>
                @if(count($advertisements)>0)
                    <ul class="list-group my-2">
                        @foreach ($advertisements as $advertisement)
                            <li class="list-group-item flex-column justify-content-between align-items-center border border-light-subtle">
                                <div class="fw-bold">
                                    <a
                                        class="link-info link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                                        href="{{ route('advertisement.show', $advertisement->id) }}">
                                        {{ $advertisement->title }} [# {{ $advertisement->id }}]
                                    </a>
                                </div>
                                <div>
                                    {{ $advertisement->description }}
                                </div>
                                <div class="opacity-50">
                                    <small>
                                        <b>Price:</b>
                                        {{ $advertisement->price }}
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        {{ $advertisements->links() }}
                    </div>
                @else
                    No advertisements yet.
                @endif
            </div>
        </div>
    </div>
@endsection
