@extends('layouts.app')

<?php
$page = 'Menu';
?>

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
       
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card" style="border-radius: 15px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);">
            <div class="card-header" style="background-color: #495057; font-weight: bold; color: white; border-radius: 15px 15px 0 0;">
                <div class="row">
                    <div class="col">
                        Menu
                    </div>
                    <div class="col d-flex justify-content-end align-items-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                data-bs-target="#tambah" style="border-radius: 10px;">
                            Tambah Menu
                        </button>
                    </div>
                </div>
            </div>
                                <!-- Modal -->
                                <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('menu.add') }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" name="name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Default file input example</label>
                                                        <input class="form-control" type="file" id="formFile" name="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input type="text" class="form-control" name="desc">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="number" class="form-control" name="price">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Stock</label>
                                                        <input type="number" class="form-control" name="stock">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
    <table class="table table-bordered border-dark table-striped">
        <thead style="background-color: #495057; color: white;">
            <tr>
                <th style="color: white;">No.</th>
                <th style="color: white;">Menu</th>
                <th style="color: white;">Gambar</th>
                <th style="color: white;">Deskripsi</th>
                <th style="color: white;">Harga</th>
                <th style="color: white;">Stock</th>
                <th style="color: white;">aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $key => $barang)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $barang->name }}</td>
                    <td>
                        <img width="100" height="75" src="{{ asset('assets/images/' . $barang->image) }}"
                            alt="not found" />
                    </td>
                    <td>{{ $barang->desc }}</td>
                    <td>{{ $barang->price }}</td>
                    <td>{{ $barang->stock }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#edit-{{ $barang->id }}" style="border-radius: 10px;">
                            Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="edit-{{ $barang->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #64B9F0; color: white;">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Menu
                                            {{ $barang->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>                                                        <form method="POST"
                                                            action="{{ route('menu.edit', ['id' => $barang->id]) }}">
                                                            @method("put")
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control" name="name"
                                                                        value="{{ $barang->name }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Select Image</label>
                                                                    <input class="form-control" type="file" id="formFile"
                                                                        name="image">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <input type="text" class="form-control" name="desc"
                                                                        value="{{ $barang->desc }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" class="form-control" name="price"
                                                                        value="{{ $barang->price }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Stock</label>
                                                                    <input type="number" class="form-control" name="stock"
                                                                        value="{{ $barang->stock }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-{{ $barang->id }}">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="delete-{{ $barang->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Menu
                                                                {{ $barang->name }}</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body"> Apakah anda yakin menghapus
                                                            {{ $barang->name }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">No</button>
                                                            <a href="{{ route('menu.delete', ['id' => $barang->id]) }}"
                                                                type="submit" class="btn btn-primary">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
