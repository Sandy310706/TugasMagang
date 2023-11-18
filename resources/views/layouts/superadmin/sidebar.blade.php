<div class="w-[20%] lgTablet:w-[40%] h-screen fixed lgMobile:hidden mobile:hidden lgTablet:hidden left-0 top-0 lgTablet:top-20 bg-slate-800 text-slate-200 shadow-lg object-cover shadow-black z-50">
    <div class="h-1/5 flex">
        <img class="mx-auto pt-6 text-4xl font-sans scale-150"></img>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-4">
        <a href="/" class="block py-2 pl-3 text-slate-400 hover:ring-1 hover:ring-white group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in-out"><span><i class="bi bi-house-door-fill group-hover:text-white"></i> Home</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="{{ route('Superadmin.Dashboard') }}" class="block py-2 pl-3 text-slate-400 hover:ring-1 hover:ring-white group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in-out"><span><i class="bi bi-speedometer group-hover:text-white"></i> Dashboard</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="{{ route('Superadmin.Akun') }}" class="block py-2 pl-3 text-slate-400 hover:ring-1 hover:ring-white group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><span><i class="fa-solid fa-user-gear"></i> Kelola Akun</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="{{ route('Superadmin.Kantin') }}" class="block py-2 pl-3 text-slate-400 hover:ring-1 hover:ring-white group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><span><i class="fa-solid fa-shop"></i> Kelola Kantin</span></a>
    </div>
</div>

