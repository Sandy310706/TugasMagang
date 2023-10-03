@extends('layouts.admin.Admin')
@section('title', 'Admin | Baca Feedback')
@section('headerNav', 'FEEDBACK')
@section('feedback')
    @foreach ($feedback as $data)
    <div class="bg-white rounded-md mb-5 flex flex-col">
        <div class="p-2 flex">
            <h1 class="flex-grow text-3xl font-outfit">{{ $data->nama_id }}<h1>
            <p class="flex-grow">{{ $data->created_at }}</p>
        </div>
        <hr class="m-auto h-2 w-[90%] bg-blue-950 rounded-xl border-2">
        <div class="p-2">
            <p>{{ $data->feedback }}</p>
        </div>
    </div>
    @endforeach
@endsection
