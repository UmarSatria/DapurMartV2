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
    </style>

    <body>
        {{-- form barang --}}
        <div class="col-12 grid-margin stretch-card" style="width: 80%;">
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
                            <textarea id="deskripsi" cols="3" rows="3" class="form-control text-white" name="deskripsi"
                                placeholder="Deskripsi produk anda" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control text-white" id="kategori" name="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->kategori }}</option>
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
                            <label for="harga_per_gram">Harga per Gram (Rp)</label>
                            <input type="number" class="form-control text-white" id="harga_per_gram" name="harga_per_gram"
                                placeholder="Harga per gram produk" min="0" required
                                style="appearance: textfield; -moz-appearance: textfield; -webkit-appearance: none;">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Tambahkan</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
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
