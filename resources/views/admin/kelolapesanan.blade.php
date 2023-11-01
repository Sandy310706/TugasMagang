@extends('layouts.admin.app')
@section('title', 'Admin | Kelola Pesanan')
@section('headerNav', 'Kelola Pesanan')
@section('kelola pesanan')
<div class="w-full">
    <table class="table-fixed w-full mt-4 rounded-lg font-outfit text-xs h-12">
        <thead class="">
            <th>No</th>
            <th>Kode Pemasanan</th>
            <th>Nama Pemesan</th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody class="text-center bg-white odd:bg-sky-300">
            @foreach ($data as $pesanan )
                <tr class="group border-b even:bg-zinc-300 odd:bg-neutral-200 border-gray-400">
                    <td class="p-2 group-hover:bg-neutral-400">{{ $loop->iteration }}</td>
                    <td class="p-2 group-hover:bg-neutral-400">{{ $pesanan->token }}</td>
                    <td class="p-2 group-hover:bg-neutral-400">{{ $pesanan->user->nama}}</td>
                    <td class="p-2 group-hover:bg-neutral-400">
                        @if($pesanan->status == 0)
                            <button type="input" id="ConfirmPembayaran" data-id="{{ $pesanan->id }}" class="text-red-500"><i class="fa-solid fa-triangle-exclamation"></i> Belum dibayar</button>
                        @else
                            <button class="text-green-500"><i class="fa-solid fa-circle-check"></i> Sudah dibayar</button>
                        @endif
                    </td>
                    <td class="p-2 group-hover:bg-neutral-400">
                        <button data-id="{{ $pesanan->id }}" class="detail text-yellow-400" id="Detail">Detail</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-full flex justify-center">
        <div id="modal" class="modal w-2/3 lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute  top-10 p-8  {{ $errors->any() ? 'block' : 'hidden' }} blur-none transition-all tablet:w-[80%] tablet:left-12" style="z-index: 999;">
            <div class="mb-2">
                <h1 class="text-4xl font-outfit">Detail Pesanan</h1>
            </div>
            <button id="closeModal" onclick="closeModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="w-full flex flex-col justify-center mt-10">
                <div class="flex border-dashed border-y-2 border-black">
                    <div class="px-4 py-1 text-lg flex-1">A134Bc</div>
                    <div class="px-2 py-1 text-lg flex-1">Gugu Firmasyah</div>
                    <div class="px-4 py-1 text-lg flex-1 text-end">10/10/2023</div>
                </div>
                <div class="flex justify-center mt-1">
                    <table id="tabel-menu" class="table-fixed w-full rounded-lg font-outfit text-lg h-12">
                        <tbody>
                            <tr>
                                <td class="text-center">Nasi Kuning</td>
                                <td class="text-center">5</td>
                                <td class="text-center">Rp. 10.000</td>
                                <td class="text-center">Rp. 50.000</td>
                            </tr>
                            <tr>
                                <td class="text-center">Nasi Kuning</td>
                                <td class="text-center">5</td>
                                <td class="text-center">Rp. 10.000</td>
                                <td class="text-center">Rp. 50.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-[30%] h-10 flex my-4 items-center self-end border-dashed border-y-2 border-black">
                    <div class="font-outfit text-lg">Total : <span>Rp. 100.000</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showDetail(id){
        const Modal = document.getElementById('modalDetail');
    }
</script>
<script>
    $(document).ready( function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.detail').click( function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            $.ajax({
                type: 'GET',
                url: '/detailpesanan/'+id,
                success: function(data){
                    console.log(data);
                    const modal = document.getElementById('modal');
                    modal.classList.remove('hidden');
                    modal.classList.add('animate-showModal');
                }
            });
        });
        $('#closeModal').click( function() {
            const modal = document.getElementById('modal');
            setTimeout(() => {
                modal.classList.add("hidden");
            }, 900);
            modal.classList.remove("animate-showModal");
            modal.classList.add("animate-hideModal");
        });
        $('#ConfirmPembayaran').click( function() {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Pesanan ini sudah di bayar?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Konfirmasi !'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id);
                    $.ajax ({
                        url: '/konfirmasipesaanan/'+id,
                        type: 'POST',
                        data: {
                            _token: '{ csrf_token() }',
                        },
                        contentType: false,
                        processData: false,
                        success: function(response){
                            Swal.fire(
                                'Berhasil !',
                                'Pesanan sudah dikonfirmasi',
                                'success'
                            )
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
