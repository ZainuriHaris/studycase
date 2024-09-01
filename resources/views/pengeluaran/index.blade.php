@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p>Rekap Data Pengeluaran</p>
                    <a href="{{ route('home')}}" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back to Home</a>
                    <a href="{{ route('pengeluaran.create') }}" class="btn border-primary">Add Data </a>
                    
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="data-table"class="table table-hover">
                            <thead>
                                <th>Pemohon</th>
                                <th>Kebutuhan</th>
                                <th>Tnaggal Transaksi</th>
                                <th>Nominal</th>
                                <th>Pilihan</th>
                            </thead>
                            <tbody>
                                @foreach( $data as $item)
                                    <tr>
                                        <td>{{$item->pemohon}}</td>
                                        <td>{{$item->kebutuhan}}</td>
                                        <td>{{$item->tanggal_pengeluaran}}</td>
                                        <td>{{$item->nominal}}</td>
                                        <td>
                                            <a href="{{ route('pengeluaran.show', $item->id) }}">Detail</a>
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
</div>
@endsection