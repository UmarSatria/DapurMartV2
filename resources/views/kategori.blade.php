@extends('layouts.sidebar')
@section('content')
    <p class="text-3xl text-gray-900 dark:text-white font-medium text-center">Daftar Kategori</p>

    <div class="flex items-center justify-between mb-4">
        <!-- Tombol Tambah dengan margin kanan 4 unit -->
        <button type="button" data-modal-target="add-modal" data-modal-toggle="add-modal"
            class="focus:outline-none text-white bg-blue-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            Tambah
        </button>
        <!-- Formulir Pencarian di sebelah kanan -->
        <form action="{{ route('kategori.index') }}" method="GET" class="flex items-center justify-end">
            <div class="relative">
                <input type="text" name="search"
                    class="pl-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white form-control"
                    placeholder="Cari kategori..." value="{{ $search ?? '' }}">
                @if (isset($search) && !empty($search))
                    <a href="{{ route('kategori.index') }}"
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



    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-s-lg">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-e-lg">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4">
                        1
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                    <td class="px-6 py-3">3</td>
                    <td class="px-6 py-3">21,000</td>
                </tr>
            </tfoot>
        </table>
    </div>


    <!-- Main modal Tambah -->
    <div id="add-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Kategori
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <input type="text" name="kategori" id="kategori"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white form-control @error('kategori') is-invalid @enderror"
                                placeholder="nama kategori">
                            @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{ $data->links() }}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Data yang dihapus tidak dapat dikembalikan!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.action = `/kategori/${id}`;
                            form.method = 'POST';
                            form.innerHTML = `
                                @csrf
                                @method('DELETE')
                            `;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
