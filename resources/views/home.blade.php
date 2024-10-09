@extends('layouts.sidebar')

@section('content')

<div class="flex justify-between max-w-4xl mx-auto space-x-4">
    <div class="w-1/4 p-6 bg-blue-200 border border-blue-300 rounded-lg shadow">
        <svg class="w-12 h-12 text-blue-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4c0 1.1.9 2 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.8-3.1a5.5 5.5 0 0 0-2.8-6.3c.6-.4 1.3-.6 2-.6a3.5 3.5 0 0 1 .8 6.9Zm2.2 7.1h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1l-.5.8c1.9 1 3.1 3 3.1 5.2ZM4 7.5a3.5 3.5 0 0 1 5.5-2.9A5.5 5.5 0 0 0 6.7 11 3.5 3.5 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4c0 1.1.9 2 2 2h.5a6 6 0 0 1 3-5.2l-.4-.8Z" />
        </svg>
        <a href="#" class="text-blue-600 hover:underline">
            <h5 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white">Total Pengguna <br> {{$totaluser}}</h5>
        </a>
        <p class="text-sm font-normal text-gray-600 dark:text-gray-300"></p>
    </div>

    <div class="w-1/4 p-6 bg-green-200 border border-green-300 rounded-lg shadow">
        <svg class="w-12 h-12 text-green-500 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 1 12c0 .5-.5 1-1 1H6a1 1 0 0 1-1-1L6 8h12Z" />
        </svg>
        <a href="#" class="text-green-600 hover:underline">
            <h5 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white">Total Barang  <br> {{$totalbarang}}</h5>
        </a>
        <p class="text-sm font-normal text-gray-600 dark:text-gray-300"></p>
    </div>

    <div class="w-1/4 p-6 bg-purple-200 border border-purple-300 rounded-lg shadow">
        <svg class="w-12 h-12 text-purple-500 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.9 15.1 15 9m-5-.6h0m3.1 7.2h0M14 4a2.8 2.8 0 0 0 2.3.9 2.8 2.8 0 0 1 2.9 3 2.8 2.8 0 0 0 .9 2.1 2.8 2.8 0 0 1 0 4.2 2.8 2.8 0 0 0-.9 2.2 2.8 2.8 0 0 1-3 2.9 2.8 2.8 0 0 0-2.1.9 2.8 2.8 0 0 1-4.2 0 2.8 2.8 0 0 0-2.2-.9 2.8 2.8 0 0 1-2.9-3 2.8 2.8 0 0 0-.9-2.1 2.8 2.8 0 0 1 0-4.2 2.8 2.8 0 0 0 .9-2.2 2.8 2.8 0 0 1 3-2.9A2.8 2.8 0 0 0 9.9 4a2.8 2.8 0 0 1 4.2 0Z" />
        </svg>
        <a href="#" class="text-purple-600 hover:underline">
            <h5 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white">Total Pesanan <br> {{$totalpesanan}}</h5>
        </a>
        <p class="text-sm font-normal text-gray-600 dark:text-gray-300"></p>
    </div>

    <div class="w-1/4 p-6 bg-pink-200 border border-pink-300 rounded-lg shadow">
        <svg class="w-12 h-12 text-gray-800 dark:text-white mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
          </svg>
        <a href="#" class="text-purple-600 hover:underline">
            <h5 class="mb-2 text-lg font-semibold text-gray-800 dark:text-white">Total Transaksi <br> {{$totalbayar}}</h5>
        </a>
        <p class="text-sm font-normal text-gray-600 dark:text-gray-300"></p>
    </div>
</div>

@endsection
