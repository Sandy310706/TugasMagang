@extends('layouts.Auth.app')
@section('title', 'Halaman Login')
@section('login')
    <div class="w-full h-screen flex justify-center items-center">
        <div class="w-[35%] h-96 bg-white rounded-3xl flex shadow-xl shadow-stone-500 bg-opacity-25">
            <div class="w-full h-full flex flex-col mt-8 items-center">
                <div class="w-full flex justify-center items-center mb-10">
                    <h1 class="text-4xl font-montserrat">L o g i n</h1>
                </div>
                <div class="w-full">
                    <form action="{{ route ('login')}}" method="POST" class="flex flex-col justify-center items-center">
                        @csrf
                        <div class="w-3/4 h-10 border-neutral-600 border-1 ring-1 ring-neutral-600 rounded-lg flex justify-start mb-8">
                            <div class="w-1/6 h-full">
                                <img src="{{ asset('img/Email.svg') }}" alt="email icon" class="flex m-auto h-full w-1/2">
                            </div>
                            <input type="email" placeholder="Masukan Email" class="rounded-lg w-full outline-none placeholder:font-nunito placeholder:font-medium placeholder:text-lg bg-transparent">
                        </div>
                        <div class="w-3/4 h-10 border-neutral-600 border-1 ring-1 ring-neutral-600 rounded-lg flex justify-start mb-10">
                            <div class="w-1/6 h-full">
                                <img src="{{ asset('img/Password.svg') }}" alt="email icon" class="flex m-auto h-full w-1/2">
                            </div>
                            <input type="password" placeholder="Masukan Password" class="rounded-lg w-full outline-none placeholder:font-nunito placeholder:font-medium placeholder:text-lg bg-transparent">
                        </div>
                        <div class="w-full h-8 flex">
                            <button class="bg-zinc-700 text-white m-auto py-1 w-1/2 rounded-xl">Login</button>
                        </div>
                    </form>
                    <div class="w-full h-8 flex">
                        <span class="font-outfit text-sm m-auto">Lupa password? <a href="#" class="text-blue-700 hover:underline">Reset</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
