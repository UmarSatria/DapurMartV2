@extends('layouts.navbar')
@section('content')
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        {{-- font --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <body class="bg-gray-100">
        <div class="flex" style="margin-top: 12rem">
            <!-- Sidebar -->
            <div class="w-1/4 bg-white p-4">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-gray-500"></i>
                    </div>
                    <div class="ml-4">
                        <div class="font-semibold">{{ $user->fullname }}</div>
                        <a href="#" class="text-sm text-gray-500">Ubah Profil</a>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li class="mb-2">
                            <a href="#" class="flex items-center text-blue-600">
                                <i class="fas fa-user mr-2"></i>
                                Akun Saya
                            </a>
                            <ul class="ml-6 mt-2">
                                <li class="mb-1"><a href="/profile" class="text-gray-600">Profil</a></li>
                                <li class="mb-1"><a href="#" class="text-blue-600">Alamat</a></li>

                            </ul>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center text-gray-600">
                                <i class="fas fa-box mr-2"></i>
                                Pesanan Saya
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="/sell" class="flex items-center text-gray-600" style="display: flex; gap: 7px;">
                                <i class="fa-solid fa-industry"></i> Ingin berjualan?
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="/grosir" class="flex items-center text-gray-600" style="display: flex; gap: 7px;">
                                <i class="fa-solid fa-xmark"></i> Kembali
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Main Content -->
            <div class="w-3/4 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Alamat Saya</h1>
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" style="margin-bottom: 2rem"
                        class="bg-red-500 text-white px-4 py-2 rounded flex items-center hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Alamat Baru
                    </button>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-4">Alamat</h2>
                    <div class="mb-4">
                        <div class="font-semibold">{{ $user->fullname }}</div>
                        <div class="text-gray-600">(+62) {{ $user->phone_number }}</div>

                        <form id="deleteForm" action="{{ route('alamat.bulkDelete') }}" method="POST">
                            @csrf
                            @foreach ($alamat as $item)
                                <div class="mb-4">
                                    <div class="flex items-center space-x-2">
                                        <!-- Checkbox untuk alamat, disembunyikan secara default -->
                                        <input type="checkbox" name="alamat_ids[]" value="{{ $item->id }}"
                                            class="alamat-checkbox hidden">

                                        <div class="text-gray-600">{{ $item->nama_jalan }}</div>
                                    </div>
                                    <div class="text-gray-600">
                                        {{ strtoupper($item->kelurahan) }}, {{ strtoupper($item->kecamatan) }},
                                        {{ strtoupper($item->kota) }}, {{ strtoupper($item->provinsi) }}, ID, 65124
                                    </div>
                                    @if ($item->status === 'utama')
                                        <span
                                            class="inline-block bg-red-100 text-red-500 px-2 py-1 text-xs font-semibold rounded mt-2">Utama</span>
                                    @elseif ($item->status === 'custom')
                                        <span
                                            class="inline-block bg-orange-100 text-orange-500 px-2 py-1 text-xs font-semibold rounded mt-2">Custom</span>
                                    @endif
                                </div>
                            @endforeach
                            <div class="flex items-center space-x-4 mt-4">
                                <a href="#" class="text-blue-500" onclick="toggleCheckboxes()">Hapus</a>
                                <button type="submit"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center hidden"
                                    id="deleteSelectedButton">
                                    Hapus Terpilih
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- add --}}
        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" style="margin-top: 1.2rem"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="{{ route('alamat.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="nama_jalan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Jalan</label>
                                <textarea id="nama_jalan" rows="2" name="nama_jalan"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="isi alamat jalan anda dengan lengkap"></textarea>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="provinsi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                                <select id="provinsi" name="provinsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Pilih Provinsi</option>
                                    <option value="jawa-timur">Jawa Timur</option>
                                    <option value="jawa-barat">Jawa Barat</option>
                                    <option value="jawa-tengah">Jawa Tengah</option>
                                </select>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="kota"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                                <select id="kota" name="kota"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="">Pilih Kota</option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="kecamatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                <input type="text" name="kecamatan" id="kecamatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product name">
                            </div>
                            <div class="col-span-2">
                                <label for="kelurahan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                                <input type="text" name="kelurahan" id="kelurahan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product name">
                            </div>
                            <select id="status" name="status" style="width: 356px"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="" selected>Pilih status alamat</option>
                                <option value="utama">Alamat Utama</option>
                                <option value="custom">Alamat Custom</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add new Address
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        <script>
            const kotaOptions = {
                "jawa-timur": ["Surabaya", "Malang", "Kediri"],
                "jawa-barat": ["Bandung", "Bogor", "Depok"],
                "jawa-tengah": ["Semarang", "Solo", "Magelang"]
            };

            document.getElementById('provinsi').addEventListener('change', function() {
                const provinsi = this.value;
                const kotaSelect = document.getElementById('kota');

                // Hapus semua opsi kota yang ada
                kotaSelect.innerHTML = '<option selected="">Pilih Kota</option>';

                // Tambahkan opsi kota yang sesuai dengan provinsi yang dipilih
                if (provinsi && kotaOptions[provinsi]) {
                    kotaOptions[provinsi].forEach(kota => {
                        const option = document.createElement('option');
                        option.value = kota.toLowerCase().replace(/\s+/g, '-');
                        option.textContent = kota;
                        kotaSelect.appendChild(option);
                    });
                }
            });

            // btn delete
            function toggleCheckboxes() {
                // Tampilkan atau sembunyikan checkbox
                const checkboxes = document.querySelectorAll('.alamat-checkbox');
                const deleteButton = document.getElementById('deleteSelectedButton');
                checkboxes.forEach(checkbox => checkbox.classList.toggle('hidden'));
                deleteButton.classList.toggle('hidden');
            }
        </script>
    </body>

    </html>
@endsection
