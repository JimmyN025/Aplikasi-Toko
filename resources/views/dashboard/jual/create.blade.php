@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    {{-- $table->string('kode_barang');
    $table->string('nama_barang');
    $table->string('merk'); --}}

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/jual" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang"
                    required autofocus value="{{ old('kode_barang') }}">
                @error('kode_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

           
            
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang"
                    required autofocus value="{{ old('nama_barang') }}">
                @error('nama_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input type="text" class="form-control @error('harga_barang') is-invalid @enderror" id="harga_barang" name="harga_barang"
                    required autofocus value="Rp. {{ old('harga_barang') }}">
                @error('harga_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Save This</button>
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
