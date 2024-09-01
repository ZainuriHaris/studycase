@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Admin') }}</div>

                <div class="card-body">
                    <a href="{{ route('pemasukan.index')}}" class="btn btn-primary">Pemasukan</a>
                    <a href="{{ route('pengeluaran.index')}}" class="btn btn-primary">Pengeluaran</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
