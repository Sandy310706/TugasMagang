@extends('layouts.Admin')
@section('title', 'Admin | Dashboard')
@section('headerNav', 'Dashboard')

@section('dashboard')
    <p>Total Menu = {{ $totalMenu }}</p>
    <p>Total Pengguna= {{ $totalAkun }}</p>
@endsection
