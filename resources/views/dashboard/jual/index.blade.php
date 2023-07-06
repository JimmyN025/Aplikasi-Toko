
@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Penjualan</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <b>{{ session('success') }}</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    




    <div class="col-lg-8 ">
        <form method="POST" action="/dashboard/jual" class="mb-5" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang"
                    required autofocus value="{{ old('kode_barang') }}">
                @error('kode_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @csrf
            </div> --}}
            
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <select class="form-select" name="kode_barang">
                    @foreach ($posts as $post)
                        @if (old('kode_barang') == $post->kode_barang)
                            <option value="{{ $post->kode_barang }}" selected>{{ $post->kode_barang }}</option>
                        @else
                            <option value="{{ $post->kode_barang }}">{{ $post->kode_barang }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div id="nama_list"></div>
            

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
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="text" class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang" name="jumlah_barang"
                    required autofocus value="{{ old('jumlah_barang') }}">
                @error('jumlah_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="harga_barang" class="form-label">Harga Barang</label>
                <input type="text" class="form-control @error('harga_barang') is-invalid @enderror" id="harga_barang" name="harga_barang"
                    required autofocus value="{{ old('harga_barang') }}">
                @error('harga_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>





            <button type="submit" class="btn btn-primary">Save This</button>
        </form>
    </div>


 




    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm ">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($jual as $j)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $j->kode_barang }}</td>
                        <td>{{ $j->nama_barang }}</td>
                        <td>Rp. {{ $j->harga_barang * $j->jumlah_barang }}</td>
                        <td>
                        <a href="/dashboard/jual/{{ $j->id }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                            
                            <form action="/dashboard/jual/{{ $j->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin ?')"><span data-feather="delete" class="align-text-bottom"></span></button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>

    <div class="">
        <a href="/export" class="badge bg-warning"><span data-feather="grid" class="align-text-bottom"></span></a>
        <a href="/dashboard/jual/create" class="badge bg-warning"><span data-feather="printer" class="align-text-bottom"></span></a>
        <form action="/dashboard/jual/" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin ?')"><span data-feather="delete" class="align-text-bottom"></span></button>
        </form>
    </div>
    
   


    <script>
        $(document).ready(function(){
         
            $('#nama_barang').keyup(function(){ 
                var query = $(this).val(); 
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('post.fetch') }}",
                        method:"POST",
                        data:{query:query, _token:_token},
                        success:function(data){
                        $('#nama_list').fadeIn();  
                            $('#nama_list').html(data);
                        }
                    });
                }
            });
         
            $(document).on('click', 'li', function(){  
                $('#nama_barang').val($(this).text());  
                $('#nama_list').fadeOut();  
            });  
         
        });
        </script>

@endsection



