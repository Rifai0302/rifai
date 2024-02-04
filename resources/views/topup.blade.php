@extends('layouts.app')

<?php
$page = 'Top Up';
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 20px">
                <div class="card-header" style="background-color: #212529; font-weight: bold; color: white; border-radius: 50px; text-align: center;">Top Up</div>
                <div class="card-body" style="border-radius: 20px; text-align: center;">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert" style="background-color: #28a745; color: white; border: 1px solid #218838;">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h4 style="font-weight: bold; font-family: 'Calibri', sans-serif;">SALDO : Rp {{ number_format($saldo->saldo, 0, ',', '.') }}</h4>

                    <form method="POST" action="{{ route('transaksi.create') }}">
                        @csrf
                        <div class="form-group mt-2" style="text-align: left;">
                            <label style="margin-left: 3px;">Jumlah:</label>
                            <input type="number" name="jumlah" class="form-control" placeholder="Mau topup sultan?">
                            <input type="hidden" name="type" value="1">
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Top Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
