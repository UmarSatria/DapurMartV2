@extends('layouts.navbar')

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


@section('content')
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            @foreach (DB::table('kategoris')->get() as $item)
                                <li><a href="{{ route('kategori.show', $item->id) }}">{{ $item->kategori }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="">
                            <div class="col-auto">
                                <div class="hero__search__form">
                                    <form action="{{ route('shop.index') }}" method="GET" class="relative">
                                        <div class="flex items-center">
                                            <input type="text" name="search" placeholder="What do you need?"
                                                value="{{ request('search') }}" class="site-input">
                                            @if (request('search'))
                                                <a href="{{ route('shop.index') }}" class="site-btn-cancel">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                        <button type="submit" class="site-btn">SEARCH</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div> --}}
                    </div>
                    <div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($shops as $item)
                                <div
                                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        <img class="p-8 rounded-t-lg" src="{{ asset('storage/' . $item->gambar_produk) }}"
                                            alt="" />
                                    </a>
                                    <div class="px-3 pb-2">
                                        <a href="#">
                                            <h5
                                                class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white mb-2">
                                                {{ $item->nama_produk }}</h5>
                                        </a>
                                        <p class="text-xs text-gray-500 dark:text-white">Kategori :
                                            {{ $item->kategori->kategori }}</p>
                                        <div class="flex items-center mt-2.5 mb-3">

                                        </div>
                                        <div class="flex items-center justify-between">
                                            <span
                                                class="text-2xl font-bold text-gray-900 dark:text-white">Rp.{{ number_format($item->harga_satuan, 0, ',', '.') }}</span>
                                            <form action="{{ route('chart.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="barang_id" value="{{ $item->id }}">
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                                <button type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 sm:px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.8-3H7.4M11 7H6.3M17 4v6m-3-3h6" />
                                                    </svg>
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>




                    </div>
                    <br>
                    {{ $shops->links() }}

                </div>
            </div>

        </div>

    </section>
@endsection
