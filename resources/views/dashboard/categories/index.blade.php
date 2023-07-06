@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <b>{{ session('success') }}</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="table-responsive col-6">
        <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Add New Category</a>
        <table class="table table-striped table-bordered table-sm ">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Category Name</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
                        <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
                            
                            <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
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
