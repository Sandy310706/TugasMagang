@extends('layouts.admin.app')
@section('title', 'Halaman Keuangan')
@section('headerNav', 'Keuangan')
@section('keuangan')
    <div class="w-full my-4 flex justify-center flex-col">
        <div class="w-full bg-white rounded-sm">
            {!! $chartSatuMinggu->container() !!}
        </div>
        <div class="w-full mt-2 bg-white rounded-sm">
            <table class="w-full">
                <thead>
                    <tr>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                    </tr>
            </table>
        </div>
    </div>
    <div class="w-full flex justify-around items-center rounded-sm bg-black h-28">
        <div class="w-[48%] h-20 rounded-md bg-white flex">
            <div class="w-[70%] flex flex-col justify-center items-start pl-4 font-outfit">
                <p>Download data Keuangan Satu Minggu</p>
                <p> Ke Exel</p>
            </div>
            <div class="w-[30%] mr-4 flex justify-center items-center">
                <button class="w-full bg-sky-500 hover:bg-sky-600 rounded-sm p-2 text-white text-sm">Download</button>
            </div>
        </div>
        <div class="w-[48%] h-20 rounded-md bg-white flex">
            <div class="w-[70%] flex flex-col justify-center items-start pl-4 font-outfit">
                <p>Download data Keuangan Satu Minggu</p>
                <p> Ke Pdf</p>
            </div>
            <div class="w-[30%] mr-4 flex justify-center items-center">
                <button class="w-full bg-sky-500 hover:bg-sky-600 rounded-sm p-2 text-white text-sm">Download</button>
            </div>
        </div>
    </div>
    <div class="w-full my-4">
        <div class="w-1/2 bg-white rounded-sm">
            {!! $chartSatuBulan->container() !!}
        </div>
    </div>
    {!! $chartSatuBulan->script() !!}
    {!! $chartSatuMinggu->script() !!}
@endsection
