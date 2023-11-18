@extends('layouts.superadmin.app ')
@section('title', 'Super Admin | Dashboard')
@section('headerNav', 'Dashboard')
@section('dashboard')
    <div class="w-full p-2">
        <div class="w-full flex justify-between">
            <div class="w-[49%] h-28 rounded-xl bg-white flex flex-col justify-start">
                <div class="w-full h-[70%] flex items-center">
                    <div class="py-2 px-4 font-balsamiq text-3xl text-neutral-700">
                        <i class="fa-solid fa-user mr-5"></i>
                        <span>User</span>
                    </div>
                </div>
                <div class="w-full h-[30%] px-4 font-balsamiq text-neutral-500">
                    <p>10 User</span></p>
                </div>
            </div>
            <div class="w-[49%] h-28 rounded-xl bg-white flex flex-col justify-start">
                <div class="w-full h-[70%] flex items-center">
                    <div class="py-2 px-4 font-balsamiq text-3xl text-neutral-700 flex items-center">
                        <span class="material-symbols-outlined mr-5" style="font-size: 1.875rem; line-height: 2.25rem;">
                            storefront
                        </span>
                        <span>Kantin</span>
                    </div>
                </div>
                <div class="w-full h-[30%] px-4 text-neutral-500 font-balsamiq">
                    <p>10 <span> Kantin</span></p>
                </div>
            </div>
        </div>
        <div class="w-full">
            <h1 class="text-lg font-balsamiq py-6">Pemberharuan Terbaru</h1>
            @foreach ($data as $test )
                {{ $test }}
            @endforeach
        </div>
    </div>
@endsection
