@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Data</div>
                <form action="{{ route('pengeluaran.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group p-3">
                            <label>Pemohon</label>
                            <input type="text" class="form-control" name="pemohon" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Kebutuhan</label>
                            <input type="text" class="form-control" name="kebutuhan" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Tanggal Keluar</label>
                            <input type="date" class="form-control" name="tanggal_pengeluaran" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Nominal (IDR)</label>
                            <input type="number" class="form-control" name="nominal" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Bukti Transfer</label>
                            <input type="file" class="form-control" name="bukti_transfer" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="content"></textarea>
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
