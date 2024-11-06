@extends('layouts.navbar')
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        {{-- font --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <body class="bg-gray-100">
        <div class="flex" style="margin-top: 11rem">
            <!-- Sidebar -->
            <div class="w-1/4 bg-white p-6">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <div class="ml-4">
                        <div class="font-semibold">{{ $user->fullname }}</div>
                        <a href="#" class="text-blue-500 text-sm">Ubah Profil</a>
                    </div>
                </div>
                <nav>
                    <ul>
                        <li class="mb-4">
                            <a href="#" class="flex items-center text-blue-500">
                                <i class="fas fa-user mr-2"></i> Akun Saya
                            </a>
                            <ul class="ml-6 mt-2">
                                <li class="mb-2"><a href="#" class="text-blue-500">Profil</a></li>
                                <li class="mb-2"><a href="{{ route('alamat.index') }}" class="text-gray-600">Alamat</a></li>
                            </ul>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="flex items-center text-gray-600">
                                <i class="fas fa-box mr-2"></i> Pesanan Saya
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
                        {{-- <li class="mb-4">
                        <a href="#" class="flex items-center text-gray-600">
                            <i class="fas fa-coins mr-2"></i> Koin Shopee Saya
                        </a>
                    </li> --}}
                    </ul>
                </nav>
            </div>
            <!-- Main Content -->

            <form class="w-3/4 bg-white p-6 ml-4" action="{{ route('profile.update', $user->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h2 class="text-xl font-semibold mb-4">Profil Saya</h2>
                <p class="text-gray-600 mb-6">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun
                </p>
                <div class="flex">
                    <div class="w-2/3">
                        <div class="mb-4">
                            <label class="block text-gray-700">Nama Lengkap</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded"
                                value="{{ $user->fullname }}" readonly>
                            <p class="text-gray-500 text-sm">Username hanya dapat diubah satu (1) kali.</p>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Email</label>
                            <input type="email" class="w-full p-2 border border-gray-300 rounded"
                                value="{{ $user->email }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Nomor Telepon</label>
                            <div class="flex items-center">
                                <input type="text" class="w-full p-2 border border-gray-300 rounded"
                                    value="{{ $user->phone_number }}" readonly>
                                <a href="#" class="text-blue-500 ml-2">Ubah</a>
                            </div>
                        </div>
                        {{-- <div class="mb-4">
                            <label class="block text-gray-700">Nama Toko</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded"
                                value="toko anda belum terdaftarkan">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Jenis Kelamin</label>
                            <div class="flex items-center">
                                <input type="radio" name="gender" class="mr-2"> Laki-laki
                                <input type="radio" name="gender" class="ml-4 mr-2"> Perempuan
                                <input type="radio" name="gender" class="ml-4 mr-2"> Lainnya
                            </div>
                        </div> --}}
                        {{-- <div class="mb-4">
                            <label class="block text-gray-700">Tanggal lahir</label>
                            <div class="flex">
                                <select class="p-2 border border-gray-300 rounded mr-2">
                                    <option>11</option>
                                </select>
                                <select class="p-2 border border-gray-300 rounded mr-2">
                                    <option>Oktober</option>
                                </select>
                                <select class="p-2 border border-gray-300 rounded">
                                    <option>2024</option>
                                </select>
                            </div>
                        </div> --}}
                        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                    <div class="w-1/3 flex flex-col items-center">
                        <div
                            class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-4 overflow-hidden">
                            @if ($user->photo_profile)
                                <img src="{{ Storage::url($user->photo_profile) }}" alt="Photo Profile"
                                    class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-user text-gray-400 text-4xl"></i>
                            @endif
                        </div>

                        <input type="file" class="opacity-0 absolute" id="fileInput" name="photo_profile"
                            onclick="openModal()">
                        <label for="fileInput" class="bg-gray-200 text-gray-700 px-4 py-2 rounded cursor-pointer">
                            {{ $user->photo_profile ? 'Ingin merubah gambar?' : 'Pilih Gambar' }}
                        </label>

                        <p class="text-gray-500 text-sm mt-2">Ukuran gambar: maks. 20 MB</p>
                        <p class="text-gray-500 text-sm">Format gambar: JPEG, PNG, JPEG, SVG</p>
                    </div>
                </div>
            </form>
        </div>

        <!-- Modal untuk Upload Gambar Baru -->
        <div id="uploadModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg w-1/3">
                <h3 class="text-lg font-semibold mb-4">Upload Gambar Baru</h3>
                <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <input type="file" name="photo_profile" class="w-full p-2 border border-gray-300 rounded">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2"
                            onclick="closeModal()">Batal</button>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Upload</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openModal() {
                document.getElementById('uploadModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('uploadModal').classList.add('hidden');
            }
        </script>
    </body>

    </html>
@endsection
