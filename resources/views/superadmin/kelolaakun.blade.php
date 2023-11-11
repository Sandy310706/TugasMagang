@extends('layouts.superadmin.app')

@section('title', 'SuperAdmin | Kelola Akun')
@section('headerNav', 'Kelola Akun')
@section('kelola akun')
<div class="w-full relative">
    <div class="flex mb-2 h-auto tablet:pl-4">
        <div class="w-1/2">
            <button id="showModal" onclick="OpenModal()" class="p-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white rounded-md font-outfit  hover:from-blue-500 hover:to-blue-800">Tambah Akun</button>
        </div>
    </div>
    <div class="w-full">
        <table id="table" class="table-fixed w-full rounded-lg font-outfit text-xs h-12">
            <thead class="bg-transparent">
                <th>Nama</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Sebagai Admin</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center bg-white">
                @foreach ($data as $users)
                <tr class="group border-b odd:bg-zinc-300 even:bg-neutral-200">
                    <td class="p-4 w-full group-hover:bg-neutral-400">{{ $users->nama }}</td>
                    <td class="p-2 group-hover:bg-neutral-400">{{ $users->email }}</td>
                    <td class="p-2 group-hover:bg-neutral-400">{{ $users->role }}</td>
                    <td class="p-2 group-hover:bg-neutral-400">{{ ($users->kantin) ? $users->kantin->namaKantin : "Bukan admin" }}</td>
                    <td class="p-2 group-hover:bg-neutral-400">
                        <button id="btnEdit" data-id="{{ $users->id }}"class="openModalEdit text-yellow-600"><i class="fa-regular fa-pen-to-square mobile:inline"></i><span class="mobile:hidden"> Edit</span></button>
                        <p class="inline"> | </p>
                        <button type="submit" data-id="{{ $users->id }}" class="btnDelete text-pink-600"><i class=" fa-solid fa-trash mobile:inline"></i><span class="mobile:hidden"> Hapus</span></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination m-2">
        {{ $data->links('vendor.pagination.simple-tailwind') }}
    </div>
</div>
<div class="w-full flex justify-center">
    <div class="w-screen h-screen bg-black bg-opacity-60 hidden absolute top-0 right-0" style="z-index: 900;" id="background">
    </div>
    <div id="modal" class="hidden w-2/3 mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute  top-5 p-8  {{ $errors->any() ? 'block' : 'hidden' }} blur-none tablet:w-[80%] tablet:left-12" style="z-index: 999;">
        <div class="mb-2">
            <h1 class="text-4xl font-outfit">Tambah Kantin</h1>
        </div>
        <button id="closeModal" onclick="closeModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <form action="{{ route('Akun.Tambah') }}" method="POST" enctype="multipart/form-data" class="p-3">
            @csrf
            <div class="mb-2 flex flex-col">
                <label for="nama" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                @error('nama')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="harga" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('email') ? 'border-red-500 ring-red-600' : ''}}">
                @error('email')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="password" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Password</label>
                <input type="text" id="password" name="password" value="{{ old('password') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('password') ? 'border-red-500 ring-red-600' : ''}}">
                @error('password')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="role" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Role</label>
                <select name="role" id="role" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option selected value="guest">Guest</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="kantin" class="mb-1 font-outfit">Sebagai Admin</label>
                <select name="kantin" id="kantin" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option selected value=""></option>
                    @foreach ($kantin as $kantins )
                        <option value="{{ $kantins->id }}">{{ $kantins->namaKantin }}</option>
                    @endforeach
                </select>
                <span class="pt-1 text-xs text-slate-600 after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Jika role admin wajib di pilih</span>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800">Input</button>
            </div>
        </form>
    </div>
    @foreach ($data as $akun )
    <div id="modalEdit{{ $akun->id }}" class="modalEdits hidden w-2/3 mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute top-10 p-8 animate-showModal {{ $errors->any() ? 'block' : 'hidden' }} tablet:w-[80%] tablet:left-12"  style="z-index: 999;">
        <div class="mb-2">
            <h1 class="text-4xl font-outfit">Edit Data</h1>
        </div>
        <button id="closeModalEdit" onclick="closeEditModal({{ $akun->id }})" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <form action="{{ url('/superadmin/kelolaakun/edit/'.$akun->id) }}" method="POST" class="p-3">
            @csrf
            @method('PUT')
            <div class="mb-2 flex flex-col">
                <label for="nama" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ $akun->nama }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                @error('nama')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="email" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Email</label>
                <input type="text" id="email" name="email" value="{{ $akun->email }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('email') ? 'border-red-500 ring-red-600' : ''}}">
                @error('email')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="role" class="mb-1 font-outfit">Role</label>
                <select name="role" id="role" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option selected value="{{ $akun->role }}">{{ $akun->role }}</option>
                    <option value="admin">Admin</option>
                    <option value="guest">Guest</option>
                </select>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="kantin" class="mb-1 font-outfit">Sebagai Admin</label>
                <select name="kantin" id="kantin" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option selected value=""></option>
                    @foreach ($kantin as $kantins )
                        <option value="{{ $kantins->id }}">{{ $kantins->namaKantin }}</option>
                    @endforeach
                </select>
                <span class="pt-1 text-xs text-slate-600 after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Jika role admin wajib di pilih</span>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800">Input</button>
            </div>
        </form>
    </div>
    @endforeach
</div>

<script>
    $(document).ready( function() {
        $('.openModalEdit').click( function(e){
            e.preventDefault();
            let id = $(this).data('id')
            let modal = document.getElementById("modalEdit"+id)
            const body = document.getElementById("body");
            const background = document.getElementById('background')
            background.classList.remove("hidden")
            modal.classList.remove("hidden")
            modal.classList.add("animate-showModal")
        })
        $('body').on('click', '.btnDelete', function(e){
            e.preventDefault();
            var id = $(this).data("id");
            console.log(id);
            var token = $('meta[name="csrf-token"]').attr('content');
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus Akun ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/kelolaakun/hapus/'+ id,
                        data: {
                            _token: token,
                        },
                        success: function(response) {
                            Swal.fire('Dihapus!', 'Item berhasil dihapus.', 'success');
                            a.location = "/superadmin/kelolaakun"
                        },
                        error: function(error) {
                            Swal.fire('Error', 'Terjadi kesalahan saat menghapus item.', 'error');
                            Swal.fire('Dihapus!', 'Item berhasil dihapus.', 'success');
                            console.log(error);
                        }
                    })
                }
            })
        })
    })
    function OpenModal() {
        const modal = document.getElementById("modal");
        const background = document.getElementById('background')

        background.classList.remove("hidden")
        modal.classList.remove('hidden');
        modal.classList.add('animate-showModal');
    }
    function closeModal() {
        const modal = document.getElementById("modal");
        const background = document.getElementById('background')
        setTimeout(() => {
            background.classList.add("hidden")
            modal.classList.add("hidden");
        }, 900);
        modal.classList.remove("animate-showModal")
        modal.classList.add("animate-hideModal");
    }

    function closeEditModal(id) {
        console.log(id);
        const modalEdit = document.getElementById("modalEdit"+id);
        const background = document.getElementById('background')
        setTimeout(() => {
            modalEdit.classList.add("hidden");
            background.classList.add("hidden")
        }, 900);
        modalEdit.classList.remove("animate-showModal");
        modalEdit.classList.add("animate-hideModal");
    }
</script>
@endsection
