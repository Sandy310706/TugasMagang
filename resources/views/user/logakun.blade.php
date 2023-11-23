@extends('layouts.user.app')
@section('title', 'Log Akun')
@section('logakun')
<h1 class="text-center Histori">Histori Pemesanan</h1>
<div class=" container container-histori" style="margin-bottom: 20px;">
    <div class="card">
        <div class="content">
            <p>No Pesanan</p>
            <div class="Detail">
                <button class="btn" i>Buka Modal</button>
            </div>
        </div>
    </div>
</div>  
@endsection
@push('style')
    <link rel="stylesheet" href="css/logakun.css">
@endpush