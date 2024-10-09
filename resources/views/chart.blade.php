@extends('layouts.navbar')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

@section('content')
    <!-- Hero Section Begin -->
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
                                <li><a href="{{ route('kategori.show', $item->id) }}">{{ $item->kategori }}</a></li>
                            @endforeach

                        </ul>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('chart.index') }}" method="GET" class="relative">
                                <div class="flex items-center">
                                    <input type="text" name="search" placeholder="What do you need?"
                                        value="{{ request('search') }}" class="site-input">
                                    @if (request('search'))
                                        <a href="{{ route('chart.index') }}" class="site-btn-cancel">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        @foreach ($cart as $item)
                            <a href="#"
                                class="relative flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-md md:flex-row md:max-w-xl hover:shadow-lg dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 transition duration-300">
                                <img class="object-contain w-full h-48 md:h-full md:w-48 rounded-t-lg md:rounded-none md:rounded-l-lg ml-3 mt-2 mb-2"
                                    src="{{ asset('storage/' . $item->barang->gambar_produk) }}" alt="">
                                <div class="flex flex-col justify-between p-4 flex-grow">
                                    <div>
                                        <h5 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                                            {{ $item->barang->nama_produk }}</h5>
                                        <p class="mb-3 text-gray-700 dark:text-gray-400">Kategori :
                                            {{ $item->barang->kategori->kategori }} </p>
                                    </div>
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="flex items-center">
                                            <span
                                                class="text-lg font-bold text-gray-900 dark:text-white">Rp.{{ number_format($item->barang->harga_satuan, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            {{-- <span class="mr-2 text-gray-700 dark:text-gray-400">Qty:</span> --}}
                                            {{-- <input type="number" class="w-16 px-2 py-1 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring focus:border-blue-300" value="1"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute top-0 right-0 m-2">
                                    <form action="{{ route('chart.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="barang_id" value="{{ $item->id }}">
                                        <button type="submit"
                                            class="text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-500 focus:outline-none">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </a>
                            <br>

                            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Pembayaran
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>

                                        <!-- Modal body -->
                                        <form action="{{ route('chart.destroy', $item->id) }}" method="POST"
                                            class="p-4 md:p-5" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2 ">
                                                    <label for="barang_id"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Produk</label>
                                                    <input type="text" name="barang_id" id="barang_id"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('barang_id') is-invalid @enderror"
                                                        value="{{ $item->barang->nama_produk }}" readonly>
                                                </div>
                                                <div class="col-span-2 ">
                                                    <label for="penerima"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerima</label>
                                                    <input type="text" name="penerima" id="penerima"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('penerima') is-invalid @enderror"
                                                        value="{{ Auth::user()->name }}" readonly>
                                                </div>

                                                <div class="col-span-2">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea name="alamat" id="alamat" rows="3"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white form-control @error('alamat') is-invalid @enderror"
                                                        placeholder="Alamat">{{ old('alamat') }}</textarea>
                                                    @error('alamat')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="col-span-2">
                                                    <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon</label>
                                                    <input type="text" name="no_telp" id="no_telp"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('no_telp') is-invalid @enderror"
                                                           value="{{ old('no_telp') }}" placeholder="No Telepon">
                                                    @error('no_telp')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="jumlah_pembelian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jumlah_pembelian</label>
                                                    <input type="number" name="jumlah_pembelian" id="jumlah_pembelian"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500form-control @error('jumlah_pembelian') is-invalid @enderror"
                                                        placeholder="jumlah_pembelian" value="{{ $item->jumlah_pembelian }}">
                                                    @error('jumlah_pembelian')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <button type="submit"
                                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Modal toggle -->
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="block w-full md:max-w-xl text-center text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            type="button">
                            Checkout
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- SweetAlert 2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Hero Section End -->
@endsection
