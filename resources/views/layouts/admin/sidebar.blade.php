<div class="w-[20%] lgTablet:w-[40%] h-screen fixed lgMobile:hidden mobile:hidden lgTablet:hidden left-0 top-0 lgTablet:top-20 bg-slate-800 text-slate-200 shadow-lg object-cover shadow-black z-50" id="Sidebar">
    <div class="h-1/5 flex">
        <img class="mx-auto pt-6 text-4xl font-sans scale-150 lgTablet:scale-100" src=""></img>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-4">
        <a href="/" class="block py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in-out"><span><i class="bi bi-house-door-fill group-hover:text-white"></i> Home</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="{{ route('Admin.Dashboard') }}" class="block py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><span><i class="bi bi-speedometer group-hover:text-white"></i> Dashboard</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="#" class="block py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><span><i class="bi bi-bar-chart-fill group-hover:text-white"></i> Kelola Keuangan</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="{{ route('Admin.Menu') }}" class="block py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><span><i class="bi bi-journal-bookmark-fill group-hover:text-white"></i> Kelola Menu</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="{{ route('Admin.Pesanan') }}" class="block py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><span> Kelola Pesanan</span></a>
    </div>
    <div class="container w-3/4 font-outfit text-md group mt-1">
        <a href="{{ route('Admin.Feedback') }}" class="block py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><span><i class="bi bi-chat-left-dots-fill group-hover:text-white"></i> Feedback</span></a>
    </div>
</div>


