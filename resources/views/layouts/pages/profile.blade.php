@extends('layouts.navbar')
@section('content')
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                        <div class="font-semibold">{{ $user->name }}</div>
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
                                <li class="mb-2"><a href="#" class="text-gray-600">Bank & Kartu</a></li>
                                <li class="mb-2"><a href="#" class="text-gray-600">Alamat</a></li>
                                <li class="mb-2"><a href="#" class="text-gray-600">Ubah Password</a></li>
                                <li class="mb-2"><a href="#" class="text-gray-600">Pengaturan Notifikasi</a></li>
                                <li class="mb-2"><a href="#" class="text-gray-600">Pengaturan Privasi</a></li>
                            </ul>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="flex items-center text-gray-600">
                                <i class="fas fa-box mr-2"></i> Pesanan Saya
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="flex items-center text-gray-600">
                                <i class="fas fa-bell mr-2"></i> Notifikasi
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="flex items-center text-gray-600">
                                <i class="fas fa-ticket-alt mr-2"></i> Voucher Saya
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
            <form class="w-3/4 bg-white p-6 ml-4" action=""  method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <h2 class="text-xl font-semibold mb-4">Profil Saya</h2>
                <p class="text-gray-600 mb-6">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun
                </p>
                <div class="flex">
                    <div class="w-2/3">
                        <div class="mb-4">
                            <label class="block text-gray-700">Username</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded" value="strm2zqdy0"
                                disabled>
                            <p class="text-gray-500 text-sm">Username hanya dapat diubah satu (1) kali.</p>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Nama</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded"
                                value="Umar Zaki Satria">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Email</label>
                            <input type="email" class="w-full p-2 border border-gray-300 rounded"
                                value="{{ $user->email }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Nomor Telepon</label>
                            <div class="flex items-center">
                                <input type="text" class="w-full p-2 border border-gray-300 rounded" value="**********89"
                                    disabled>
                                <a href="#" class="text-blue-500 ml-2">Ubah</a>
                            </div>
                        </div>
                        <div class="mb-4">
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
                        </div>
                        <div class="mb-4">
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
                        </div>
                        <button class="bg-orange-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                    <div class="w-1/3 flex flex-col items-center">
                        <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-user text-gray-400 text-4xl"></i>
                        </div>
                        <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Pilih Gambar</button>
                        <p class="text-gray-500 text-sm mt-2">Ukuran gambar: maks. 1 MB</p>
                        <p class="text-gray-500 text-sm">Format gambar: .JPEG, .PNG</p>
                    </div>
                </div>
            </form>
        </div>
    </body>

    </html>
@endsection
