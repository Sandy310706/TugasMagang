@extends('layouts.admin.app')
@section('title', 'Admin | Kelola Pesanan')
@section('headerNav', 'Kelola Pesanan')
@section('kelola pesanan')
<div class="w-full">
    <table id="tabel-pesanan" class="table-fixed w-full mt-4 rounded-lg font-outfit text-xs h-12">
        <thead class="">
            <th>No</th>
            <th>Kode Pemasanan</th>
            <th>Nama Pemesan</th>
            <th>Status</th>
            <th>#</th>
        </thead>
        <tbody class="text-center bg-white odd:bg-sky-300">

        </tbody>
    </table>
    <div class="w-full flex justify-center">
        @foreach ($data as $pesanan)
            <div id="modal" class="modal{{ $pesanan->id }} hidden w-2/3 lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute  top-10 p-8   blur-none transition-all tablet:w-[80%] tablet:left-12" style="z-index: 999;">
                <div class="mb-2">
                    <h1 class="text-4xl font-outfit">Detail Pesanan</h1>
                </div>
                <button id="closeModal" data-id="{{ $pesanan->id }}" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="w-full flex flex-col justify-center mt-10">
                    <div class="flex w-full border-dashed justify-between border-y-2 border-black">
                        <div id="tokenPesanan" class="px-4 w-[30%] py-1 text-lg text-center">{{ $pesanan->token }}</div>
                        <div id="namaPemesan" class="px-2 w-[30%] py-1 text-lg text-center">{{ $pesanan->user->nama }}</div>
                        <div id="waktuPesanan" class="px-4 w-[30%] py-1 text-lg text-center">{{ $pesanan->created_at }}</div>
                    </div>
                    <div class="flex justify-center mt-1">
                        p
                    </div>
                    <div class="w-[30%] h-10 flex my-4 items-center self-end border-dashed border-y-2 border-black">
                        <div class="font-outfit text-lg">Total : <span>Rp. </span></div>
                    </div>
                </div>
            </div>
        @endforeach
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
        $('#tabel-pesanan').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language:{
                paginate:{
                    next:"<i class='fa-solid fa-chevron-right'></i>",
                    previous: "<i class='fa-solid fa-chevron-left'></i>"
                }
            },
            ajax: "{{ route('Admin.getPesanan') }}",
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {   data: 'token', name: 'Token Pesanan' },
                {   data: 'nama', name: 'Nama Pesanan'  },
                {   data: 'status', name: 'Status Pesanan',
                    render: function($status){
                        if ($status == 0) {
                            return " <a href='javascript:void(0)' class='ConfirmPembayaran text-red-500' data-id=''><i class='fa-solid fa-circle-exclamation'></i> Belum dibayar.</a>"
                        } else {
                            return " <a href='javascript:void(0)' class='ConfirmPembayaran text-green-500' data-id=''><i class='fa-solid fa-circle-check'></i> Sudah dibayar.</a>"
                        }
                    }
                },
                {   data: 'action', name: 'Action'  }
            ]
        })
        $('body').on('click', '#detailBtn', function (e) {
            e.preventDefault()
            let id = $(this).data('id')
            $('.modal'+id).removeClass('hidden')
            $('.modal'+id).addClass('animate-showModal')
        })
        $('#closeModal').click( function() {
            var id = $(this).data('id')
            setTimeout(() => {
                $('.modal'+id).addClass('hidden')
            }, 900);
            $('.modal'+id).removeClass("animate-showModal");
            $('.modal'+id).addClass("animate-hideModal");
        });
        $('.ConfirmPembayaran').click( function() {
            var id = $(this).data('id');
            console.log(id);
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
