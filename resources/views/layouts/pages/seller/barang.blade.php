@extends('layouts.pages.seller.dashboard_seller')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>MERCHANDISE | DAPURMART</title>
    </head>

    <style>
        .form-control::placeholder {
            color: #dcdcdc;
            /* Light grey for placeholder text */
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>

    <body>
        {{-- form barang --}}
        <div class="col-12 grid-margin stretch-card" style="width: 100%;">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Produk</h4>
                    <p class="card-description">Tambahkan produk yang ingin anda jual! </p>
                    <form class="forms-sample" action="{{ route('barang.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="customFile" class="form-label">Gambar Produk</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="document.getElementById('customFile').click();">
                                    Choose File
                                </button>
                                <input type="file" class="d-none" id="customFile" name="gambar_produk"
                                    onchange="displayFileName(this)">
                                <input type="text" class="form-control text-white" placeholder="No file chosen" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control text-white" id="nama_produk" name="nama_produk"
                                placeholder="Isi nama produk anda" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Produk</label>
                            <textarea id="deskripsi" cols="3" rows="4" class="form-control text-white" name="deskripsi"
                                placeholder="Deskripsi produk anda" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control text-white" id="kategori" name="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->kategori }} ( {{ $item->satuan }} )
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control text-white" id="stok" name="stok"
                                placeholder="Jumlah stok" min="0" required
                                style="appearance: textfield; -moz-appearance: textfield; -webkit-appearance: none;">
                        </div>
                        <div class="form-group">
                            <label for="harga_per_gram">Harga (Rp)</label>
                            <input type="number" class="form-control text-white" id="harga_per_gram" name="harga_per_gram"
                                placeholder="Harga produk.." min="0" required
                                style="appearance: textfield; -moz-appearance: textfield; -webkit-appearance: none;">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Tambahkan</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>


        {{-- data barang --}}
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-4 mb-4">
                    <div class="card text-white bg-dark shadow-sm" style="border-radius: 10px;">
                        <img class="card-img-top" src="{{ asset('storage/' . $item->gambar_produk) }}" alt="Gambar Produk"
                        style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->nama_produk }}</h4>
                            <p class="card-text">{{ Str::limit($item->deskripsi, 50) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Kategori: {{ $item->kategori->kategori }} ( {{ $item->kategori->satuan }} )</small>
                                <small class="text-muted">Stok: {{ $item->stok }}</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <span class="text-white font-weight-bold">Rp
                                    {{ number_format($item->harga_per_gram, 0, ',', '.') }}</span>
                                <a href="{{ route('barang.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $data->links() }}
        </div>



        <script>
            // Display selected file name in the text input
            function displayFileName(input) {
                const fileName = input.files[0]?.name;
                if (fileName) {
                    input.nextElementSibling.value = fileName;
                }
            }
        </script>
    </body>

    </html>
@endsection
