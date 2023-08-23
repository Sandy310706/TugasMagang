@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    Dashboard {{ Auth::user()->role }}

@endsection
