<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @extends('layouts.sidebar')

    @section('content')
        {{-- LIBRARY MODAL --}}

        <p class="text-3xl text-gray-900 dark:text-white font-medium text-gray-900 dark:text-white text-center">Daftar Produk
        </p>

        <br>

        <div class="flex items-center justify-between mb-4">
            <!-- Tombol Tambah dengan margin kanan 4 unit -->
            <button type="button" data-modal-target="add-button" data-modal-toggle="add-button"
                class="focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-3 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Tambah
            </button>


            <!-- Formulir Pencarian di sebelah kanan -->
            <form action="{{ route('barang.index') }}" method="GET" class="flex items-center justify-end">
                <div class="relative">
                    <input type="text" name="search"
                        class="pl-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white form-control"
                        placeholder="Cari kategori..." value="{{ $search ?? '' }}">
                    @if (isset($search) && !empty($search))
                        <a href="{{ route('barang.index') }}"
                            class="absolute inset-y-0 left-0 flex items-center pl-2 text-gray-700 hover:text-gray-800 font-medium text-sm">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M6.707 5.293a1 1 0 0 1 1.414 1.414L11 10.414l3.293-3.293a1 1 0 0 1 1.414 1.414L12.414 12l3.293 3.293a1 1 0 1 1-1.414 1.414L11 13.414l-3.293 3.293a1 1 0 0 1-1.414-1.414L9.586 12 6.293 8.707a1 1 0 0 1 0-1.414z" />
                            </svg>
                        </a>
                    @endif
                </div>
                <button type="submit"
                    class="ml-2 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
            </form>
        </div>


        <table class="table">
            <thead class="table-success">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $row)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img src="{{ asset('storage/' . $row->gambar_produk) }}" alt="" width="80vw"
                                height="100vw">
                        </td>
                        <td>{{ $row->nama_produk }}</td>
                        <td>{{ $row->kategori->kategori }}</td>
                        <td>
                            Rp. {{ number_format($row->harga_satuan, 0, ',', '.') }}
                        </td>
                        <td>{{ $row->stok }}</td>
                        <td>{{ $row->deskripsi }}</td>
                        <td>
                            <button data-modal-target="edit-modal{{ $row->id }}"
                                data-modal-toggle="edit-modal{{ $row->id }}"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</button>

                            <!-- Main modal -->
                            <div id="edit-modal{{ $row->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Edit Produk
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
                                        <form action="{{ route('barang.update', $row->id) }}" method="POST"
                                            enctype="multipart/form-data" class="p-4 md:p-5">
                                            @method('put')
                                            @csrf
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                                                        Produk</label>
                                                    @if ($row->gambar_produk)
                                                        <img src="{{ asset('storage/' . $row->gambar_produk) }}"
                                                            alt="Produk" width="200px" height="200px">
                                                    @endif
                                                    <br>
                                                    <input
                                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                        id="file_input" type="file" name="gambar_produk">
                                                    @error('gambar_produk')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="nama_produk"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Nama
                                                    </label>
                                                    <input type="text" name="nama_produk" id="nama_produk"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control @error('nama_produk') is-invalid @enderror"
                                                        placeholder="Nama Produk" required=""
                                                        value="{{ $row->nama_produk }}">
                                                    @error('nama_produk')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="harga_satuan"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                        Satuan</label>
                                                    <input type="number" name="harga_satuan" id="harga_satuan"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500form-control @error('harga_satuan') is-invalid @enderror"
                                                        placeholder="Harga Satuan" value="{{ $row->harga_satuan }}">
                                                    @error('harga_satuan')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="stok"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                                                    <input type="number" name="stok" id="stok"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500form-control @error('stok') is-invalid @enderror"
                                                        placeholder="Stok" value="{{ $row->stok }}">
                                                    @error('stok')
                                                        <span class="text-red-500">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-span-2">
                                                    <label for="kategori"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                                    <select name="kategori_id" class="form-select"
                                                        aria-label="Default select example">
                                                        @foreach ($kategori as $d)
                                                            <option value="{{ $d->id }}"
                                                                {{ $row->kategori_id == $d->id ? 'selected' : '' }}>
                                                                {{ $d->kategori }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="form-floating col-span-2">
                                                    <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2"
                                                        style="height: 100px">{{ $row->deskripsi }}</textarea>
                                                    <label for="floatingTextarea2">Deskripsi</label>
                                                </div>
                                                {{-- <div class="col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Produk</label>
                                        <textarea id="" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketik deskripsi produk di sini">
                                            {{$row->deskripsi}}
                                        </textarea>
                                    </div> --}}

                                            </div>
                                            <button type="submit"
                                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Simpan Perubahan
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('barang.destroy', $row->id) }}" method="POST"
                                onclick="return confirm('Apa anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                            </form>

                            <!-- Main modal Tambah -->
                            <div id="add-button" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Tambah Produk
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-2 md-5">
                                            <form action="{{ route('barang.store') }}" method="POST"
                                                enctype="multipart/form-data" class="p-4 md:p-5">
                                                @csrf
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                                                            Produk</label>
                                                        <img id="preview_image" class="mt-2"
                                                            style="max-width: 150px; display: none;" alt="Preview Gambar">
                                                        <br>
                                                        <input
                                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                                            id="file_input" type="file" name="gambar_produk"
                                                            onchange="previewImage(this)">
                                                        @error('gambar_produk')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-span-2">
                                                        <label for="nama_produk"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                        <input type="text" name="nama_produk" id="nama_produk"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control"
                                                            placeholder="Nama Produk" value="{{ old('nama_produk') }}">
                                                        @error('nama_produk')
                                                            <div class="text-red-500">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="harga_satuan"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                                            Satuan</label>
                                                        <input type="text" name="harga_satuan" id="harga_satuan"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control"
                                                            placeholder="Nama Produk" value="{{ old('harga_satuan') }}">
                                                        @error('harga_satuan')
                                                            <div class="text-red-500">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="stok"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                                                        <input type="number" name="stok" id="stok"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 form-control @error('stok') is-invalid @enderror"
                                                            placeholder="Stok" value="{{ old('stok') }}">
                                                        @error('stok')
                                                            <span class="text-red-500">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="kategori"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                                        <select name="kategori_id"
                                                            class="form-control @error('kategori_id') is-invalid @enderror"
                                                            aria-label="Default select example">
                                                            <option value="" selected>Open this select menu</option>
                                                            @foreach ($kategori as $d)
                                                                <option value="{{ $d->id }}"
                                                                    {{ old('kategori_id') == $d->id ? 'selected' : '' }}>
                                                                    {{ $d->kategori }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('kategori_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="description"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Deskripsi Produk</label>
                                                        <textarea id="description" rows="4"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control"
                                                            name="deskripsi" id="floatingTextarea2" style="height: 100px" value="{{ old('deskripsi') }}"
                                                            placeholder="Ketiki deskripsi produk disini"></textarea>
                                                        @error('deskripsi')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <button type="submit"
                                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Tambahkan Data
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            function previewImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        document.getElementById('preview_image').src = e.target.result;
                        document.getElementById('preview_image').style.display = 'block';
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const createButton = new Modal(document.getElementById("create-button"));
                document.querySelector('[data-modal-toggle="create-button"]').addEventListener('click', function() {
                    createButton.toggle();
                });
            });
        </script>
        {{ $data->links() }}
    @endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.4.7/flowbite.min.js"></script>

</body>

</html>
