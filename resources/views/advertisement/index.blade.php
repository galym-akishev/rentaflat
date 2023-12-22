@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="mt-2">Listing of advertisements</h4>
                <form method="GET" action="{{ route('advertisement.index') }}">
                    <div class="col-sm-3 my-1">
                        <label class="sr-only" for="title" hidden></label>
                        <div class="input-group">
                            <div class="input-group-text p-1 opacity-50">
                                <button type="submit" class="btn btn-info p-2">Search</button>
                            </div>
                            <input type="text" class="form-control opacity-50" name="title" id="title"
                                   placeholder="... title ...">
                        </div>
                    </div>
                </form>
                <form method="GET" action="{{ route('advertisement.index') }}">
                    <div class="col-sm-3 my-1">
                        <label class="sr-only" for="description" hidden></label>
                        <div class="input-group">
                            <div class="input-group-text p-1 opacity-50">
                                <button type="submit" class="btn btn-info p-2">Search</button>
                            </div>
                            <input type="text" class="form-control opacity-50" name="description" id="description"
                                   placeholder="... description ...">
                        </div>
                    </div>
                </form>
                <form method="GET" action="{{ route('advertisement.index') }}">
                    <div class="col-sm-3 my-1">
                        <label class="sr-only" for="price" hidden></label>
                        <div class="input-group">
                            <div class="input-group-text p-1 opacity-50">
                                <button type="submit" class="btn btn-info p-2">Search</button>
                            </div>
                            <input type="text" class="form-control opacity-50" name="price" id="price"
                                   placeholder="... price ...">
                        </div>
                    </div>
                </form>
                @if(count($advertisements)>0)
                    <ul class="list-group my-2">
                        @foreach ($advertisements as $advertisement)
                            <li class="list-group-item flex-column justify-content-between align-items-center border border-light-subtle">
                                <div class="fw-bold">{{ $advertisement->title }}</div>
                                <div class="opacity-50">
                                    <small>
                                        <a
                                            class="link-info link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                                            href="{{ route('advertisement.show', $advertisement->id) }}">
                                            [Details of ID: {{ $advertisement->id }}]
                                        </a>
                                    </small>
                                </div>
                                <div>
                                    {{ $advertisement->description }}
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
