@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-conten-center">
        <div class="col-12">
            <h2 class="mb-2 page-title">
                Data Riwayat Produk
            </h2>
            <div class="row my-4">
                <div class="col-md 12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <table class="table datatables table-bordered table-hover" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama Produk</th>
                                        <th>Status</th>
                                        <th>Stok Dimasukan</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($riwayat))
                                        @foreach ($riwayat as $riwayats)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $riwayats->product->nama_produk }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        @if ($riwayats->type == 'masuk')
                                                            <div class="badge rounded-pill bg-primary w-100"> Barang {{ $riwayats->type }}
                                                            </div>
                                                        @elseif ($riwayats->type == 'keluar')
                                                            <div class="badge rounded-pill bg-dark w-100"> Barang {{ $riwayats->type }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $riwayats->qty }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $riwayats->note }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $riwayats->created_at->format('d F, Y') }}
                                                    </div>
                                                </td>
                                               
                                                
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection