@extends('layouts.admin.app')
@section('title', 'Admin | Baca Feedback')
@section('headerNav', 'Feedback')
@section('feedback')
    @if ($cekFeedback === 0)
        <div class="w-full flex justify-center">
            <img src="{{ asset('img/FeedbackKosong.png') }}" alt="">
        </div>
    @else
        @foreach ($feedback as $data)
            <div class="w-full tablet:w-screen tablet:flex tablet:justify-center text-white">
                <div class="bg-sky-400 rounded-md mb-5 flex flex-col w-full tablet:w-[90%]">
                    <div class="p-2 flex justify-center items-center tablet:w-[80%]">
                        <h1 class="flex-grow text-3xl font-outfit">{{ $data->nama_id }}<h1>
                        <p class="flex-grow">{{ $data->created_at }}</p>
                    </div>
                    <hr class="m-auto h-1 w-[90%] bg-whiterounded-xl">
                    <div class="p-2">
                        <p>{{ $data->feedback }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
