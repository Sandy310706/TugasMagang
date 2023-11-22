<div class="w-full">
    <a href="javascript:void(0)" id="btnEdit"  data-id="{{ $row->id }}" class="btnEdit text-yellow-600"><i class="fa-regular fa-pen-to-square mobile:inline"></i><span class="mobile:hidden"> Edit</span></a>
        <span> | </span>
    <a href="javascript:void(0)" id="btnDelete{{ $row->id }}" data-id="{{ $row->id }}" class="btnDelete text-red-600"><i class="fa-solid fa-trash"></i><span> Hapus</span></a>
</div>
<div class="w-full">
    <a href="/superadmin/detailKantin/{{ $row->namaKantin }}" id="btnDetailKantin" data-id="{{ $row->id }}" class="text-sky-500"> Detail Kantin</a>
</div>
