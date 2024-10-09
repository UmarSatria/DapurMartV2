<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet"/>

@push('styles')
    <!-- Link-style yang sudah ada -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- Link-style yang baru -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css">
@endpush

@extends('layouts.filter-navbar')

@section('content')

<section class="hero">
    <div class="container mx-auto">
        <br>
        <p class="text-4xl font-semibold text-gray-900 dark:text-white text-center">Menu Kategori</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($barangs as $item)
                <div class="max-w-md mx-auto mt-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="w-full h-56 object-cover object-center rounded-t-lg" src="{{ asset('storage/'.$item->gambar_produk) }}" alt="{{ $item->nama_produk }}" />
                    </a>
                    <div class="p-4">
                        <a href="#" class="text-lg font-semibold text-gray-900 dark:text-white block mb-2">{{ $item->nama_produk }}</a>
                        <p class="text-sm text-gray-500 dark:text-white mb-2">Kategori: {{ $item->kategori->kategori }}</p>
                        <div class="flex items-center mb-3">
                            {{-- Add any additional information or icons here --}}
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900 dark:text-white">Rp.{{ number_format($item->harga_satuan, 0, ',', '.') }}</span>
                            <form action="{{ route('chart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="barang_id" value="{{ $item->id }}">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.8-3H7.4M11 7H6.3M17 4v6m-3-3h6"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
