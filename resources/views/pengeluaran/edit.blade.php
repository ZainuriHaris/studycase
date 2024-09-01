@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Data Pemasukan</div>
                <form action="{{ route('pengeluaran.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="card-body">
                        <div class="form-group p-3">
                            <label>Pemohon</label>
                            <input type="text" class="form-control" name="pemohon" value="{{$data->pemohon}}" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Kebutuhan</label>
                            <input type="text" class="form-control" name="kebutuhan" value="{{$data->kebutuhan}}" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Tanggal Masuk</label>
                            <input type="date" class="form-control" name="tanggal_pengeluaran" value="{{$data->tanggal_pengeluaran}}" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Nominal (IDR)</label>
                            <input type="number" class="form-control" name="nominal" value="{{$data->nominal}}" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Bukti Transfer</label>
                            <input type="file" class="form-control" name="bukti_transfer" value="{{$data->bukti_transfer}}" >
                        </div>
                        <div class="form-group p-3">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="content" >
                                {!! ($data->keterangan) !!}
                            </textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit"class="btn btn-primary">Submit data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
