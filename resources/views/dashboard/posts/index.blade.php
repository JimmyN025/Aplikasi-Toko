@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products of Victory Grace</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <b>{{ session('success') }}</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="table-responsive">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Add New Product</a>
        <table class="table table-striped table-bordered table-sm ">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->kode_barang }}</td>
                        <td>{{ $post->nama_barang }}</td>
                        <td>{{ $post->merk }}</td>
                        <td>{{ $post->jumlah_barang }}</td>
                        
                        <td>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                            
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
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
@endsection
