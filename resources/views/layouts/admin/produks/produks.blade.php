@extends('layouts.admin.master.master')


@section('title', 'Halaman Utama')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Produk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Type</th>
                                <th>Stok</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Type</th>
                                <th>Stok</th>
                                <th>Foto</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($produks as $produk)
                                <tr>
                                    <td>{{ $produk->name }}</td>
                                    <td>{{ $produk->description }}</td>
                                    <td>Rp {{ number_format($produk->price, 0, ',', '.') }}</td>
                                    <td>{{ $produk->type }}</td>
                                    <td>{{ $produk->stock }}</td>
                                    <td><img src="{{ asset('storage/' . $produk->photo_main) }}" class="card-img-top"
                                            alt="{{ $produk->name }}"></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
