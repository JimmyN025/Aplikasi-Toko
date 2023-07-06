@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Pesanan</h1>
    </div>

    {{-- $table->string('kode_barang');
    $table->string('nama_barang');
    $table->string('merk'); --}}

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/jual/{{ $jual->id }}" class="mb-5"  enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" required autofocus value="{{ old('kode_barang', $jual->kode_barang) }}">
                @error('kode_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" required autofocus value="{{ old('nama_barang', $jual->nama_barang) }}">
                @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input type="text" class="form-control @error('harga_barang') is-invalid @enderror" id="harga_barang" name="harga_barang" required value="{{ old('harga_barang', $jual->harga_barang) }}">
                @error('harga_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="text" class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang" name="jumlah_barang" required value="{{ old('jumlah_barang', $jual->jumlah_barang) }}">
                @error('jumlah_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    {{-- 
    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script> --}}

    <script>
        const nama_barang = document.querySelector("#nama_barang");
        const slug = document.querySelector("#slug");

        nama_barang.addEventListener('change', function() {
            fetch('/dashboard/post/checkSlug?nama_barang=' + nama_barang.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

    
    </script>
@endsection


