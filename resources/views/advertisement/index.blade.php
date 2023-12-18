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
                    <th scope="col" class="px-6 py-3">
                        Link
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
                        <td class="px-6 py-4">
                            <a href="{{ route('advertisement.show', $advertisement->id) }}">Details</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="post">
                        <div class="post-thumb">
                            <a href="blog-single.html">
                                <img class="img-fluid" src="images/blog/blog-post-1.jpg" alt="">
                            </a>
                        </div>
                        <h3 class="post-title"><a href="blog-single.html">How To Wear Bright Shoes</a></h3>
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="ion-calendar"></i> 20, MAR 2020
                                </li>
                                <li>
                                    <i class="ion-android-people"></i> POSTED BY ADMIN
                                </li>
                                <li>
                                    <a href="blog-grid.html"><i class="ion-pricetags"></i> LIFESTYLE</a>,<a
                                        href="blog-left-sidebar.html"> TRAVEL</a>, <a href="blog-right-sidebar.html">FASHION</a>
                                </li>

                            </ul>
                        </div>
                        <div class="post-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit vitae placeat ad
                                architecto nostrum
                                asperiores vel aperiam, veniam eum nulla. Maxime cum magnam, adipisci architecto
                                quibusdam cumque veniam
                                fugiat quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio vitae ab
                                doloremque accusamus
                                sit, eos dolorum officiis a perspiciatis aliquid. Lorem ipsum dolor sit amet,
                                consectetur adipisicing
                                elit. Quod, facere. </p>
                            <a href="blog-single.html" class="btn btn-main">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div>
@endsection
