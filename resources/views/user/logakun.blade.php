@extends('layouts.user.app')
@section('title', 'Log Akun')
@section('logakun')
<h1 class="text-center Histori">Log Akun</h1>
<div class=" container container-histori" style="flex-direction:column;">
    @foreach ($data as $perubahan)
            <div class="card">
                <div class="content">
                    <p>Password anda telah di ubah oleh Superadmin {{ $perubahan->user->nama }} pada {{ $perubahan->created_at }}</p>
                </div>
            </div>
    @endforeach
</div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/logakun.css') }}">
@endpush
