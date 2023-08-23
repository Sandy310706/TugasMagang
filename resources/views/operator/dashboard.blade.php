@extends('layouts.app')

@section('title', 'Dashboard | Operator')

@section('content')

@if(Route::has('login'))
    @auth
        <p>Sudah login</p>
    @else
        <p>Belum login</p>
    @endauth
@endif


@endsection
