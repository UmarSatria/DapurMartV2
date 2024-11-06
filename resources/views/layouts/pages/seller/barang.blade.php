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

    <body>
        {{-- form barang --}}
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Produk</h4>
                    <p class="card-description">Tambahkan produk yang ingin anda jual!</p>
                    <form class="forms-sample" action="{{ route('barang.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Buah">Buah</option>
                                <option value="Sayur">Sayur</option>
                                <option value="Daging">Daging</option>
                                <option value="Bumbu">Bumbu</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
