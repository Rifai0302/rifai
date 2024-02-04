@extends('layouts.app')

<?php
$page = 'Jajan';
?>

@section('content')

<!-- tabel saldo -->
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mb-3">
    <div class="col-md-12">
        <div class="card shadow-sm border-0" style="border: 1px solid #343a40; border-radius: 10px; background: linear-gradient(to right, #495057,#343a40);">
            <div class="card-body" style="color: #fff; text-align: center;">
                <h5 style="font-family: 'Open Sans', sans-serif; font-weight: bold;">Saldo Anda :</h5>

                <h1 class="display-4 font-weight-bold" style="font-family: sans-serif;">
                    Rp.{{ number_format($saldo->saldo, 0, ',', '.') }}
                </h1>
                <p class="lead" style="font-family: sans-serif;">Nikmati belanja Anda di 64Mart!</p>
            </div>
        </div>
    </div>
</div>

<!-- tabel menu -->
<div class="row">
    @foreach ($barangs as $barang)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('assets/images/' . $barang->image) }}" class="card-img-top" alt="{{ $barang->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $barang->name }}</h5>
                    <p class="card-text">{{ $barang->desc }}</p>
                    <p class="card-text">Price: {{ $barang->price }}</p>
                    <form class="text-center" method="POST" action="{{ route('addToCart', ['id' => $barang->id]) }}">
                        @csrf
                        <input type="number" name="jumlah" class="form-control" value="1">
                        <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                        <button class="btn btn-primary mt-2" type="submit">Tambah Ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- tabel keranjang -->

        <br/>
        <div class="container mt-4">
    <div class="card">
    <div class="card-header" style="background-color: #3498db; font-weight: bold; color: white">
        Keranjang {{ count($carts) > 0 ? '' . $carts[0]->invoice_id : '' }}
    </div>
    <div class="card-body" style="background-color: #ecf0f1;">
            @if (count($carts) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>jumlah</th>
                                <th>Total</th>
                                <th>verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $key => $cart)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $cart->barang->name }}</td>
                                    <td>Rp {{ number_format($cart->barang->price, 0, ',', '.') }}</td>
                                    <td>{{ $cart->jumlah }}</td>
                                    <td>Rp {{ number_format($cart->barang->price * $cart->jumlah, 0, ',', '.') }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('removeFromCart', ['id' => $cart->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end">Total :</td>
                                <td colspan="2">Rp {{ number_format($total_cart, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('checkout') }}" class="btn btn-primary">Pergi ke Checkout</a>
                </div>
            @else
                <p class="text-center">Keranjang Kamu Kosong nih,Hayuk jajan.</p>
            @endif
        </div>
    </div>
</div>

<!--tabel pembelian -->

        <br/>
        <div class="container">
    <div class="card">
        <div class="card-header" style="background-color: #3498db; font-weight: bold; color: white">Pembelian {{ count($carts) > 0 ? '' . $carts[0]->invoice_id : '' }}</div>
        <div class="card-body" style="background-color: #ecf0f1;">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checkouts as $key => $checkout)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $checkout->barang->name }}</td>
                                <td>{{ $checkout->barang->price }}</td>
                                <td>{{ $checkout->jumlah }}</td>
                                <td>{{ $checkout->barang->price * $checkout->jumlah }}</td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right;">Total :</td>
                            <td>{{ $total_checkout }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('bayar') }}" class="btn btn-primary">Beli</a>
        </div>
    </div>
</div>
@endsection

