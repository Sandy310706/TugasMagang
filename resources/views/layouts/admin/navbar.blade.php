<div class="h-20 box-border">
    <div class="lgMobile:w-full mobile:w-full lgTablet:w-full h-20 bg-slate-900 flex fixed w-4/5 text-white" style="z-index: 800;">
        <h1 class="w-1/2 font-medium text-3xl my-auto ml-4">@yield('headerNav') | @yield('namaKantin')</h1>
        <div class="w-1/2 relative" style="z-index: 2">
            <button class="absolute mobile:hidden right-20 top-7 hover:text-slate-300" onclick="openDropdown()" id="dropdownTrigger">Hallo, {{ auth()->user()->nama }} <i class="HandPhone:hidden fa-solid fa-play scale-75" style="transition: transform 1s;" id="dropdownIcon"></i></button>
            <button onclick="showSidebar()" id="SidebarTrigger"><span class="hidden lgTablet:inline absolute right-10 top-7 scale-150"><i id="IconSidebar" class="fa-solid fa-bars"></i></span></button>
            <button onclick="showMenu()" id="MenuTrigger"><span class="hidden lgMobile:inline mobile:inline absolute right-10 top-7 scale-150"><i id="IconSidebar" class="fa-solid fa-bars"></i></span></button>
            <div class="absolute right-4 top-14 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden" id="dropdownMenu">
                <ul>
                    <li><a href="/log/user/{{ auth()->user()->nama }}" class="block px-4 py-2 text-gray-800 font-outfit hover:bg-gray-200 hover:rounded-t-lg">Log Akun</a></li>
                    <li><a href="/ubahpassword/{{ auth()->user()->nama }}" class="block px-4 py-2 text-gray-800 font-outfit hover:bg-gray-200">Ubah Password</a></li>
                    <li><a href="/logout/{{ auth()->user()->nama }}" class="block px-4 py-2 text-gray-800 font-outfit hover:bg-gray-200 hover:rounded-b-lg">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="w-screen hidden fixed transition-all text-white bg-slate-800 z-50" id="MenuSidebar">
    <div class="flex flex-col justify-center items-center">
        <div class="w-full h-10 py-6 flex justify-center items-center hover:bg-slate-900" id="Menu">
            <a href="/" class="block">Beranda</a>
        </div>
        <div class="w-full h-10 py-6 flex justify-center items-center hover:bg-slate-900" id="Menu">
            <a href="{{ route('Admin.Dashboard') }}" class="block">Dashboard</a>
        </div>
        <div class="w-full h-10 py-6 flex justify-center items-center hover:bg-slate-900" id="Menu">
            <a href="{{ route('Admin.Kuangan') }}" class="block">Keuangan</a>
        </div>
        <div class="w-full h-10 py-6 flex justify-center items-center hover:bg-slate-900" id="Menu">
            <a href="{{ route('Admin.Menu') }}" class="block">Kelola Menu</a>
        </div>
        <div class="w-full h-10 py-6 flex justify-center items-center hover:bg-slate-900" id="Menu">
            <a href="{{ route('Admin.Pesanan') }}" class="block">Kelola Pesanan</a>
        </div>
        <div class="w-full h-10 py-6 flex justify-center items-center hover:bg-slate-900" id="Menu">
            <a href="{{ route('Admin.Feedback') }}" class="block">Feedback</a>
        </div>
        <div class="w-full h-10 py-6 flex justify-center items-center hover:bg-slate-900" id="Menu">
            <a href="/logout/{{ auth()->user()->nama }}" class="block">Logout</a>
        </div>
    </div>
</div>
<script>
    const dropdownTrigger = document.getElementById("dropdownTrigger");
    const dropdownMenu = document.getElementById("dropdownMenu");
    const dropdownIcon = document.getElementById('dropdownIcon');
    document.addEventListener("click", function (event) {
        if (
            !dropdownTrigger.contains(event.target) &&
            !dropdownMenu.contains(event.target)
        ) {
            setTimeout(function() {
                dropdownMenu.classList.add("hidden");
            } , 400);
            dropdownMenu.classList.add("animate-hideDropdownMenu");
            dropdownMenu.classList.remove("animate-showDropdownMenu");
            dropdownIcon.classList.remove('rotate-90');
        }
    });

    const SidebarTrigger = document.getElementById("SidebarTrigger")
    const Sidebar = document.getElementById("Sidebar")
    const SidebarMenu = document.getElementById("SidebarMenu")
    const SidebarIcon = document.getElementById('SidebarIcon');
    document.addEventListener("click", function (event) {
        if (
            !SidebarTrigger.contains(event.target) &&
            !Sidebar.contains(event.target)
        ) {
            setTimeout(function() {
                Sidebar.classList.add("lgTablet:hidden");
            } , 400);
            Sidebar.classList.remove("lgTablet:animate-showSidebar");
            Sidebar.classList.add("lgTablet:animate-hideSidebar");
        }
    });

    function openDropdown(){
        const dropdownTrigger = document.getElementById('dropdownTrigger');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownIcon = document.getElementById('dropdownIcon');

        if(dropdownMenu.classList.contains('hidden')) {
            dropdownMenu.classList.remove('hidden')
            dropdownIcon.classList.add('rotate-90')
            dropdownMenu.classList.add('animate-showDropdownMenu');
        }else{
            setTimeout(function() {
                dropdownMenu.classList.add("hidden");
            } , 400);
            dropdownMenu.classList.add("animate-hideDropdownMenu");
            dropdownMenu.classList.remove("animate-showDropdownMenu");
            dropdownMenu.classList.add('animate-hideDropdownMenu')
            dropdownIcon.classList.remove('rotate-90');
        }
    }

    function closeDropdown(){
        const dropdownMenu  = document.getElementById('dropdownMenu');
        const dropdownIcon = document.getElementById('dropdownIcon');

        setTimeout(function() {
                dropdownMenu.classList.add("hidden");
            } , 400);
            dropdownMenu.classList.add("animate-hideDropdownMenu");
            dropdownMenu.classList.remove("animate-showDropdownMenu");
            dropdownIcon.classList.remove('rotate-90');
    }

    function showSidebar(){
        const Sidebar = document.getElementById("Sidebar")
        if( Sidebar.classList.contains("lgTablet:hidden")){
            Sidebar.classList.remove("lgTablet:hidden");
            Sidebar.classList.remove("lgTablet:animate-hideSidebar")
            Sidebar.classList.add("lgTablet:w-[25%]");
            Sidebar.classList.add("lgTablet:animate-showSidebar");
        }else{
            setTimeout(function() {
                Sidebar.classList.add("lgTablet:hidden")
            }, 400);
            Sidebar.classList.remove("lgTablet:animate-showSidebar");
            Sidebar.classList.add("lgTablet:animate-hideSidebar");
        }
    }
    function showMenu(){
        const MenuSidebar = document.getElementById("MenuSidebar");
        const Menu = document.getElementById("Menu");
        if( MenuSidebar.classList.contains("hidden")){
            MenuSidebar.classList.remove("hidden");
            MenuSidebar.classList.add("animate-showMenu");
        }else{
            setTimeout(function() {
                MenuSidebar.classList.add("hidden")
            }, 1000);
            MenuSidebar.classList.remove("animate-showMenu");
            MenuSidebar.classList.add("animate-hideMenu")
        }
    }
</script>

