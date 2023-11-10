@extends('layouts.admin.app')
@section('title', 'Halaman Keuangan')
@section('headerNav', 'Keuangan')
@section('keuangan')
    <div class="w-full mb-1 flex justify-center flex-col">
        <h1 class="font-outfit pt-4 pl-1 text-xl">Bar Grafik Pemasukan Minggu ini</h1>
        <div class="w-full bg-white rounded-sm">
            {!! $chartSatuMinggu->container() !!}
        </div>
        <h1 class="font-outfit pt-4 text-xl">Tabel Pemasukan Minggu ini</h1>
        <div class="w-full mb-2 bg-white rounded-sm">
            <table class="w-full">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="p-2 border-r">Senin</th>
                        <th class="border-r">Selasa</th>
                        <th class="border-r">Rabu</th>
                        <th class="border-r">Kamis</th>
                        <th class="border-r">Jum'at</th>
                        <th>Sabtu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center bg-neutral-200">
                        <td class="py-4 border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td>Rp. 10000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="w-full flex justify-around items-center rounded-sm h-28">
        <div class="w-[48%] h-20 rounded-md bg-white flex">
            <div class="w-[70%] flex flex-col justify-center items-start pl-4 font-outfit">
                <p>Download data Keuangan Minggu ini</p>
                <p> Ke Exel.</p>
            </div>
            <div class="w-[30%] mr-4 flex justify-center items-center">
                <button class="w-full bg-sky-500 hover:bg-sky-600 rounded-sm p-2 text-white text-sm">Download</button>
            </div>
        </div>
        <div class="w-[48%] h-20 rounded-md bg-white flex">
            <div class="w-[70%] flex flex-col justify-center items-start pl-4 font-outfit">
                <p>Download data Keuangan Minggu ini</p>
                <p> Ke Pdf.</p>
            </div>
            <div class="w-[30%] mr-4 flex justify-center items-center">
                <button class="w-full bg-sky-500 hover:bg-sky-600 rounded-sm p-2 text-white text-sm">Download</button>
            </div>
        </div>
    </div>
    <hr class="border-y-2 border-gray-400 my-4">
    <div class="w-full flex justify-between my-4">
        <div class="w-[49%]">
            <h1 class="font-outfit text-xl">Bar Grapik Pemasukan Keuangan Bulan Ini
            <div class="bg-white rounded-sm">
                {!! $chartSatuBulan->container() !!}
            </div>
        </div>
        <div class="w-[49%]">
            <h1 class="font-outfit text-xl">Tabel Pemasukan Bulan ini</h1>
            <div class="w-full mb-2 bg-white rounded-sm">
                <table class="w-full">
                    <thead class="bg-slate-800 text-white">
                        <tr>
                            <th class="p-2 border-r">Bulan Pertama</th>
                            <th class="border-r">Bulan Kedua</th>
                            <th class="border-r">Bulan Ketiga</th>
                            <th>Bulan Keempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center bg-neutral-200">
                            <td class="py-4 border-r border-white">Rp. 10000</td>
                            <td class="border-r border-white">Rp. 10000</td>
                            <td class="border-r border-white">Rp. 10000</td>
                            <td>Rp. 10000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-full">
                <div class="w-full h-20 mb-2 rounded-md bg-white flex">
                    <div class="w-[70%] flex flex-col justify-center items-start pl-4 font-outfit">
                        <p>Download data Keuangan Bulan Ini</p>
                        <p> Ke Pdf.</p>
                    </div>
                    <div class="w-[30%] mr-4 flex justify-center items-center">
                        <button class="w-full bg-sky-500 hover:bg-sky-600 rounded-sm p-2 text-white text-sm">Download</button>
                    </div>
                </div>
                <div class="w-full h-20 rounded-md bg-white flex">
                    <div class="w-[70%] flex flex-col justify-center items-start pl-4 font-outfit">
                        <p>Download data Keuangan Bulan Ini</p>
                        <p> Ke Exel.</p>
                    </div>
                    <div class="w-[30%] mr-4 flex justify-center items-center">
                        <button class="w-full bg-sky-500 hover:bg-sky-600 rounded-sm p-2 text-white text-sm">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="border-y-2 border-gray-400 my-4">
    <div class="w-full mb-1 flex justify-center flex-col">
        <h1 class="font-outfit pt-4 pl-1 text-xl">Bar Grafik Pemasukan Tahun ini</h1>
        <div class="w-full bg-white rounded-sm">
            {!! $chartSatuTahun->container() !!}
        </div>
        <h1 class="font-outfit pt-4 text-xl">Tabel Pemasukan Tahun ini</h1>
        <div class="w-full mb-2 bg-white rounded-sm">
            <table class="w-full">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="py-2 border-r w-[16%]">Januari</th>
                        <th class="border-r w-[16%]">Febuari</th>
                        <th class="border-r w-[16%]">Maret</th>
                        <th class="border-r w-[16%]">April</th>
                        <th class="border-r w-[16%]">Mei</th>
                        <th class="w-[16%]">Juni</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center bg-neutral-200">
                        <td class="py-4 border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td>Rp. 10000</td>
                    </tr>
                </tbody>
            </table>
            <table class="w-full mt-2">
                <thead class="bg-slate-800 text-white">
                    <tr>
                        <th class="py-2 border-r w-[16%]">Juli</th>
                        <th class="border-r w-[16%]">Agustus</th>
                        <th class="border-r w-[16%]">September</th>
                        <th class="border-r w-[16%]">Oktober</th>
                        <th class="border-r w-[16%]">November</th>
                        <th class="w-[16%]">Desember</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center bg-neutral-200">
                        <td class="py-4 border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td class="border-r border-white">Rp. 10000</td>
                        <td>Rp. 10000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-full flex justify-around items-center rounded-sm h-28">
            <div class="w-[48%] h-20 rounded-md bg-white flex">
                <div class="w-[70%] flex flex-col justify-center items-start pl-4 font-outfit">
                    <p>Download data Keuangan Tahun ini</p>
                    <p> Ke Exel.</p>
                </div>
                <div class="w-[30%] mr-4 flex justify-center items-center">
                    <button class="w-full bg-sky-500 hover:bg-sky-600 rounded-sm p-2 text-white text-sm">Download</button>
                </div>
            </div>
            <div class="w-[48%] h-20 rounded-md bg-white flex">
                <div class="w-[70%] flex flex-col justify-center items-start pl-4 font-outfit">
                    <p>Download data Keuangan Tahun ini</p>
                    <p> Ke Pdf.</p>
                </div>
                <div class="w-[30%] mr-4 flex justify-center items-center">
                    <button class="w-full bg-sky-500 hover:bg-sky-600 rounded-sm p-2 text-white text-sm">Download</button>
                </div>
            </div>
        </div>
    </div>
    {!! $chartSatuTahun->script() !!}
    {!! $chartSatuBulan->script() !!}
    {!! $chartSatuMinggu->script() !!}
@endsection
