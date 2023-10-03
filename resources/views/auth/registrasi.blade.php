@extends('layouts.Auth.app')
@section('title', 'Halaman Registrasi')
@section('registrasi')
    <div class="w-full h-screen flex flex-col justify-center items-center ">
        @if (session('berhasil'))
            <div class="w-[35%] h-[8%] rounded-lg flex justify-center items-center mt-4 bg-green-500 shadow-xl shadow-stone-500 text-white">
                <p><i class="fa-solid fa-circle-check"></i> {{ session('berhasil') }}</p>
            </div>
        @endif
        <div class="w-full h-[92%] flex justify-center items-center">
            <div class="w-[35%] bg-white rounded-3xl flex shadow-xl shadow-stone-500 bg-opacity-25">
                <div class="w-full h-full flex flex-col mt-10 items-center">
                    <div class="w-full flex justify-center items-center mb-10">
                        <h1 class="text-4xl font-montserrat">R e g i s</h1>
                    </div>
                    <div class="w-full">
                        <form action="{{ route('registrasi') }}" method="POST" class="flex flex-col justify-center items-center">
                            @csrf
                            <div class="w-3/4 h-10 border-1 border-neutral-600 ring-1 ring-neutral-600 rounded-lg flex justify-start {{ $errors->has('nama') ? 'border-red-500 ring-red-600 mb-0' : 'mb-10'}}">
                                <div class="w-1/6 h-full">
                                    <img src="{{ asset('img/Nama.svg') }}" alt="email icon" class="flex m-auto h-full w-1/2">
                                </div>
                                <input type="text" placeholder="Masukan Nama" value="{{ old('nama') }}" name="nama" class="rounded-lg w-full outline-none placeholder:font-nunito placeholder:font-medium placeholder:text-lg bg-transparent">
                            </div>
                                @error('nama')
                                    <div class="mb-5 w-3/4 pl-2 flex justify-start">
                                        <p class="mt-1 font-nunito text-xs text-red-600"><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</p>
                                    </div>
                                @enderror
                            <div class="w-3/4 h-10 border-1 border-neutral-600 ring-1 ring-neutral-600 rounded-lg flex justify-start {{ $errors->has('email') ? 'border-red-500 ring-red-600 mb-0' : 'mb-10'}}">
                                <div class="w-1/6 h-full">
                                    <img src="{{ asset('img/Email.svg') }}" alt="email icon" class="flex m-auto h-full w-1/2">
                                </div>
                                <input type="email" placeholder="Masukan Email" value="{{ old('email') }}" name="email" class="rounded-lg w-full outline-none placeholder:font-nunito placeholder:font-medium placeholder:text-lg bg-transparent">
                            </div>
                                @error('email')
                                    <div class="mb-5 w-3/4 pl-2 flex justify-start">
                                        <p class="mt-1 font-nunito text-xs text-red-600"><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</p>
                                    </div>
                                @enderror
                            <div class="w-3/4 h-10 border-neutral-600 border-1 ring-1 ring-neutral-600 rounded-lg flex justify-start {{ $errors->has('password') ? 'border-red-500 ring-red-600 m-0' : 'mb-10'}}">
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
                            <div class="w-full h-8 flex justify-center items-center">
                                <button class="bg-zinc-700 text-white h-full py-1 w-1/2 justify-center items-center rounded-xl" type="submit">Regis</button>
                            </div>
                        </form>
                        <div class="w-full h-8 flex mb-10">
                            <span class="font-outfit text-sm m-auto">Lupa password? <a href="#" class="text-blue-700 hover:underline">Reset</a></span>
                            <span class="font-outfit text-sm m-auto">Sudah Punya akun? <a href="{{ route('login') }}" class="text-blue-700 hover:underline">Login</a></span>
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
    </script>
@endsection
