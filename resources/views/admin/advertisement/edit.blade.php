@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-wrap">
                <h4 class="mt-2">Edit the published status of the advertisement</h4>
                <div class="border border-light-subtle rounded-2">
                    <div class="mx-3 mt-2">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="bg-info">{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                    <form action="{{ route('admin.advertisement.update', $advertisement->id) }}"
                          method="post"
                          enctype="multipart/form-data"
                          class="mx-3">
                        @csrf
                        @method('patch')
                        <div class="form-row mt-2">
                            <div>
                                <b>ID:</b>
                            </div>
                            <div>
                                {{ $advertisement->id }}
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <b>Title:</b>
                        </div>
                        <div class="form-row">
                            {{ $advertisement->title }}
                        </div>
                        <div class="form-row mt-2">
                            <label for="published"><b>You are allowed to change the published status:</b></label>
                            <select id="published" name="published" class="form-select" aria-label="Status">
                                @foreach($publishedStatusesEnum as $publishedStatus)
                                    @if($advertisement->published===$publishedStatus)
                                        <option selected value={{ $publishedStatus }}>
                                            @if($publishedStatus)
                                                Published
                                            @else
                                                Not published
                                            @endif
                                        </option>
                                    @else
                                        <option value={{ $publishedStatus }}>
                                            @if($publishedStatus)
                                                Published
                                            @else
                                                Not published
                                            @endif
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <button
                            type="submit"
                            class="btn btn-info mb-2 mt-4">
                            Update
                        </button>
                        <a
                            href="{{ route('admin.advertisement.show', $advertisement->id) }}"
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
