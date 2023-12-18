@extends('layouts.main')
@section('content')

<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <form class="max-w-md mx-auto" action="{{ route('advertisement.update', $advertisement->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="grid md:grid-cols-1 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" "
                        value="{{ $advertisement->title }}"
                        required />
                    <label for="title"
                           class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Advertisement title
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input
                        type="text"
                        name="description"
                        id="description"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" "
                        value="{{ $advertisement->description }}"
                        required />
                    <label for="description"
                           class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Advertisement description
                    </label>
                </div>
            </div>
            <button
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Update the advertisement
            </button>
        </form>

    </div>
</div>
@endsection