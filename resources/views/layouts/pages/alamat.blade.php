@extends('layouts.navbar')
@section('content')
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                                <li class="mb-1"><a href="#" class="text-gray-600">Bank & Kartu</a></li>
                                <li class="mb-1"><a href="#" class="text-blue-600">Alamat</a></li>
                                <li class="mb-1"><a href="#" class="text-gray-600">Ubah Password</a></li>
                                <li class="mb-1"><a href="#" class="text-gray-600">Pengaturan Notifikasi</a></li>
                                <li class="mb-1"><a href="#" class="text-gray-600">Pengaturan Privasi</a></li>
                            </ul>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center text-gray-600">
                                <i class="fas fa-box mr-2"></i>
                                Pesanan Saya
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center text-gray-600">
                                <i class="fas fa-bell mr-2"></i>
                                Notifikasi
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="flex items-center text-gray-600">
                                <i class="fas fa-ticket-alt mr-2"></i>
                                Voucher Saya
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Main Content -->
            <div class="w-3/4 p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Alamat Saya</h1>
                    <button class="bg-red-500 text-white px-4 py-2 rounded flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Alamat Baru
                    </button>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-4">Alamat</h2>
                    <div class="mb-4">
                        <div class="font-semibold">{{ $user->fullname }}</div>
                        <div class="text-gray-600">(+62) {{ $user->phone_number }}</div>
                        <div class="text-gray-600">L.A. Sucipto gang 18 (No 2A)</div>
                        <div class="text-gray-600">BLIMBING, KOTA MALANG, JAWA TIMUR, ID, 65124</div>
                        <span
                            class="inline-block bg-red-100 text-red-500 px-2 py-1 text-xs font-semibold rounded mt-2">Utama</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="#" class="text-blue-500">Ubah</a>
                        <a href="#" class="text-blue-500">Hapus</a>
                        <button class="border border-gray-300 text-gray-600 px-4 py-2 rounded">Atur sebagai utama</button>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
