@extends('layouts.Auth.app')
@section('title', 'Halaman Login')
@section('login')
    <div class="w-full h-screen flex flex-col justify-center items-center ">
        @if (session('berhasil'))
            <div class="relative w-[35%] h-[8%] rounded-lg mt-4 bg-green-400 shadow-sm shadow-stone-500 text-white" id="alert">
                <div class="flex justify-center items-center w-full h-full">
                    <p><i class="fa-solid fa-circle-check"></i> {{ session('berhasil') }} </p>
                </div>
                <div class="absolute -right-3 -top-3">
                    <button id="trigger" class="bg-white w-6 scale-110 rounded-full"><i class="fa-solid fa-xmark text-black"></i></button>
                </div>
            </div>
        @endif
        <div class="w-full h-[92%] flex justify-center items-center">
            <div class="w-[35%] h-96 bg-white rounded-3xl flex shadow-xl shadow-stone-500 bg-opacity-25">
                <div class="w-full h-full flex flex-col mt-10 items-center">
                    <div class="w-full flex justify-center items-center mb-10">
                        <h1 class="text-4xl font-montserrat">L o g i n</h1>
                    </div>
                    <div class="w-full">
                        <form action="{{ route('login') }}" method="POST" class="flex flex-col justify-center items-center">
                            @csrf
                            <div class="w-3/4 h-10 border-1 border-neutral-600 ring-1 ring-neutral-600 rounded-lg flex justify-start {{ $errors->has('email') ? 'border-red-500 ring-red-600 mb-0' : 'mb-10'}}">
                                <div class="w-1/6 h-full">
                                    <img src="{{ asset('img/Email.svg') }}" alt="email icon" class="flex m-auto h-full w-1/2">
                                </div>
                                <input type="email" placeholder="Masukan Email" name="email" value="{{ old('email') }}" class="rounded-lg w-full outline-none placeholder:font-nunito placeholder:font-medium placeholder:text-lg bg-transparent">
                            </div>
                                @error('email')
                                    <div class="mb-5 w-3/4 pl-2 flex justify-start">
                                        <p class="mt-1 font-nunito text-xs text-red-600"><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</p>
                                    </div>
                                @enderror
                            <div class="w-3/4 h-10 border-neutral-600 border-1 ring-1 ring-neutral-600 rounded-lg flex justify-start {{ $errors->has('password') ? 'border-red-500 ring-red-600 m-0' : 'mb-8'}}">
                                <div class="w-1/6 h-full">
                                    <img src="{{ asset('img/Password.svg') }}" alt="email icon" class="flex m-auto h-full w-1/2">
                                </div>
                                <input type="password" id="Password" placeholder="Masukan Password" name="password" class="rounded-lg w-full outline-none placeholder:font-nunito placeholder:font-medium placeholder:text-lg bg-transparent">
                                <div class="w-1/6 h-full flex justify-center items-center">
                                    <span id="cekPassword" onclick="change()"><i class="fa-regular fa-eye"></i></span>
                                </div>
                            </div>
                                @error('password')
                                    <div class="mb-5 w-3/4 pl-2 flex justify-start">
                                        <p class="mt-1 font-nunito text-xs text-red-600"><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</p>
                                    </div>
                                @enderror
                            <div class="w-full h-8 flex mb-1">
                                <button class="bg-zinc-700 text-white m-auto w-1/2 py-1 rounded-xl" type="submit">L o g i n</button>
                            </div>
                        </form>
                        <div class="w-full h-8 flex">
                            <span class="font-sans text-sm m-auto">Belum punya akun? <a href="/registrasi" class="text-blue-700 hover:underline">Buat</a></span>
                            <span class="font-sans text-sm m-auto">Lupa password? <a href="#" class="text-blue-700 hover:underline">Reset</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function change()
        {
            var x = document.getElementById('Password').type;
            if ( x == 'password'){
                document.getElementById('Password').type = 'text';
                document.getElementById('cekPassword').innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
            }else{
                document.getElementById('Password').type = 'password';
                document.getElementById('cekPassword').innerHTML = '<i class="fa-regular fa-eye"></i>';
            }
        }
        const alert = document.getElementById('alert')
        const trigger = document.getElementById('trigger')
        trigger.addEventListener("click", function () {
                alert.classList.add("hidden");
        });
    </script>
@endsection
