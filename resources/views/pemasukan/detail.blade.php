@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Detail Pemasukan') }}</div>

                <div class="card-body">
                    <table class="table table-responsive">
                        <tr>
                            <th>Sumber Pemasukan</th>
                            <th>{{$data->sumber_pemasukan}}</th>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk</th>
                            <th>{{$data->tanggal_masuk}}</th>
                        </tr>
                        <tr>
                            <th>Nominal</th>
                            <th>IDR {{$data->nominal}}</th>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <th>{!! ($data->keterangan) !!}</th>
                        </tr>
                        <tr>
                            <th>Bukti Transfer</th>
                            <th>
                                <img src="{{asset('storage/images/transfer/'.$data->bukti_transfer)}}"alt="bukti_transfer"style="max-height: 250px; max-width:300;"/>
                            </th>
                        </tr>
                    </table>
                
                </div>
            </div>
            <div class="card-footer p-3">
            <div class="form-group">
                    <a href="{{route('pemasukan.edit',$data->id)}}" class="btn btn-warning">Edit data</a>
                </div>
                <div class="form-group">
                    <form action="{{ route('pemasukan.destroy', $data->id)}}" method="POST">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit"class="btn btn-danger"onclick="return confirm('apakah yakin akan dihapus...?')">Delete data</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
