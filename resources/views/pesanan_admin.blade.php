@extends('layouts.sidebar')

@section('content')
<div class="container">
    <p class="text-4xl font-normal text-gray-900 dark:text-white text-center">Data Pesanan</p>
    <br>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-green-400">
            <thead class="text-xs text-gray-700 uppercase bg-green-200 dark:bg-gray-700 dark:text-gray-400">
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
                    <th scope="col" class="px-6 py-3">
                        Aksi
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
                        <td class="px-6 py-4">
                            {{$row->jumlah_pembelian}}
                        </td>
                        <td class="px-6 py-4">
                            Rp. {{ number_format($row->barang->harga_satuan, 0,',','.')}}
                        </td>
                        <td class="px-6 py-4">
                             Rp. {{ number_format($row->total, 0,',','.')}}
                        </td>
                        <td class="px-6 py-4">
                            {{$row->status}}

                        </td>
                        <td class="px-6 py-4 flex justify-between items-center">

                            <!-- Modal toggle -->
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="mx-2 block text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg class=" w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
                                  </svg>
                            </button>

                            <!-- Main modal -->
                            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Ubah Status Pesanan
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="{{ route('update_status', $row->id) }}" method="post" class="p-4 md:p-5">
                                            @csrf
                                            @method('put')

                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-white"></label>
                                                    <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <option value="menunggu pembayaran" {{ $row->status == 'menunggu pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                                                        <option value="menunggu konfirmasi" {{ $row->status == 'menunggu konfirmasi' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                                        <option value="ditolak" {{ $row->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                        <option value="selesai" {{ $row->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Simpan
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal toggle -->
                            <button data-modal-target="detail-modal" data-modal-toggle="detail-modal" class="mx-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <svg class="w-6 h-6 text-gray-100 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                            </button>

                            <!-- Main modal -->
                            <div id="detail-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Bukti Pembayaran
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form class="p-4 md:p-5">
                                            <div class="col-span-2 flex justify-center items-center">
                                                <div class="col-span-2">
                                                    @foreach ($pembayaran as $bayar)
                                                    <!-- Tampilkan data pembayaran -->
                                                    <p>ID Pesanan: {{ $bayar->pesanan->id }}</p>

                                                    <!-- Tampilkan gambar bukti -->
                                                    <img src="{{ asset('storage/' . $bayar->bukti) }}" alt="Bukti Pembayaran">
                                                @endforeach
                                                </div>
                                            </div>
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
@endsection
