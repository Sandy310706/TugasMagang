<div class="w-1/5 h-screen left-0 top-0 bg-slate-800 text-slate-200 shadow-lg shadow-black fixed">
    <div class="h-1/5 flex">
        <img class="mx-auto pt-6 text-4xl font-sans scale-150" src="{{ asset('img/Apah.png') }}"></img>
    </div>
    {{-- <hr class="w-[90%] border-2 border-black rounded-lg my-auto"> --}}
    <div class="container w-3/4 font-outfit text-md group mt-4">
        <a href="/" class="block py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in-out"><span><i class="bi bi-house-door-fill group-hover:text-white"></i> Home</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="" class="block py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><span> Kelola Pesanan</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="{{ route('Superadmin.Kantin') }}" class="block py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><span> Kelola Kantin</span></a>
    </div>
</div>

