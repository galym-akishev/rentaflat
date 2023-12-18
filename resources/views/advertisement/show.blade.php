@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <h1>Specific advertisement:</h1>
        <div>
            ID: {{ $advertisement->id }}
        </div>
        <div>
            Title: {{ $advertisement->title }}
        </div>
        <div>
            Description: {{ $advertisement->description }}
        </div>
    </div>
    <div>
        <a href="{{ route('advertisement.edit', $advertisement->id) }}">Edit</a>
    </div>
    <div>
        <form action="{{ route('advertisement.delete', $advertisement->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form>

    </div>
    <div class="row">
        <a href="{{ route('advertisement.index') }}">Back</a>
    </div>
</div>
@endsection
