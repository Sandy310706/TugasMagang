<div class="w-1/5 h-screen left-0 top-0 bg-slate-800 text-slate-200 shadow-lg shadow-black fixed">
    <div class="h-1/5 flex">
        <img class="mx-auto pt-6 text-4xl font-sans scale-150" src="{{ asset('img/Apah.png') }}"></img>
    </div>
    {{-- <hr class="w-[90%] border-2 border-black rounded-lg my-auto"> --}}
    <div class="oontainer w-3/4 font-outfit text-md group mt-4">
        <div class="py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in-out"><a href="/"><span><i class="bi bi-house-door-fill group-hover:text-white"></i> Home</span></a></div>
    </div>
    <div class="oontainer w-3/4 font-outfit text-md group mt-1">
        <div class="py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><a href="{{ route('Admin.Dashboard') }}"><span><i class="bi bi-speedometer group-hover:text-white"></i> Dashboard</span></a></div>
    </div>
    <div class="oontainer w-3/4 font-outfit text-md group mt-1">
        <div class="py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><a href="#"><span><i class="bi bi-bar-chart-fill group-hover:text-white"></i> Kelola Keuangan</span></a></div>
    </div>
    <div class="oontainer w-3/4 font-outfit text-md group mt-1">
        <div class="py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><a href="{{ route('Admin.Menu') }}"><span><i class="bi bi-journal-bookmark-fill group-hover:text-white"></i> Kelola Menu</span></a></div>
    </div>
    <div class="oontainer w-3/4 font-outfit text-md group mt-1">
        <div class="py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><a href="#"><span>Kelola Pesanan</span></a></div>
    </div>
    <div class="oontainer w-3/4 font-outfit text-md group mt-1">
        <div class="py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><a href="{{ route('Admin.Feedback') }}"><span><i class="bi bi-chat-left-dots-fill group-hover:text-white"></i> Feedback</span></a></div>
    </div>
    <div class="oontainer w-3/4 font-outfit text-md group mt-1">
        <div class="py-2 pl-3 text-slate-400 group-hover:text-white rounded-r-xl hover:bg-sky-400 transition duration-200 hover:ease-in"><a href="/logout"><span>Logout</span></a></div>
    </div>
</div>

