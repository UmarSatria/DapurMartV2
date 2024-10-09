@extends('layouts.navbar')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<div class="hero">
    <div class="container">
        <p class="text-4xl font-normal text-gray-900 dark:text-white text-center">Pesanan Anda</p>
        <br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center rtl:text-right text-gray-900 dark:text-green-400">
                <thead class="table-success">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Penerima
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Beli
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga Satuan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $key => $row)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$row->barang->nama_produk}}
                        </th>
                            <td class="px-6 py-4">
                                {{$row->penerima}}
                            </td>
                            <td class="px-6 py-4">
                                {{$row->jumlah_pembelian}}
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($row->barang->harga_satuan, 0,',','.')}}
                            </td>
                            <td class="px-6 py-4">
                                total: Rp. {{ number_format($row->total, 0,',','.')}}
                            </td>

                            <td class="px-6 py-4 text-center">
                                @if($row->status == 'selesai')
                                <button class="mx-auto block text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" disabled>
                                    Selesai
                                    </button>
                                @elseif($row->status == 'menunggu konfirmasi')
                                <button class="mx-auto block text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800" disabled>
                                    Menunggu Konfirmasi
                                    </button>
                                @elseif($row->status == 'ditolak')
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="mx-auto block text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-800 dark:hover:bg-red-900 dark:focus:ring-red-900" type="button">
                                    Bukti Ditolak <br>Upload Ulang
                                    </button>
                                @else
                                    <!-- Jika bukti pembayaran belum ada -->
                                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="mx-auto block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                        Bayar Sekarang
                                    </button>
                                @endif
                                <!-- Main modal -->
                                <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Upload Bukti Pembayaran
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5" action="{{route('pesanan.update', $row->id)}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="col-span-2" >
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                                                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="bukti" class="form-control @error('bukti') is-invalid @enderror" value="{{$row->bukti}}">
                                                    @error('bukti')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <br>
                                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    kirim
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
