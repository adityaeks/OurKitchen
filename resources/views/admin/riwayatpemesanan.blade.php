@extends('layouts.mainadmin')
@section('content')
    <div class="container mt-4">
        <div class="row mb-0">

            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3 text-white">Riwayat Pemesanan</h4>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Jeni Madu</th>
                        <th>Quantity</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail->customer }}</td>
                        <td>
                            @foreach (json_decode($detail->products) as $product)
                                {{ $product }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach (json_decode($detail->amounts) as $amount)
                                {{ $amount }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach (json_decode($detail->prices) as $harga)
                                {{ number_format($harga, 0, ',', '.') }}<br>
                            @endforeach
                        </td>
                        <td>{{ number_format($detail->total, 0, ',', '.') }}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
