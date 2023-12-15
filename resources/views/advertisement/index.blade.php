@extends('layouts.main')
@section('content')
<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($advertisements as $advertisement)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $advertisement->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $advertisement->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $advertisement->description }}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
