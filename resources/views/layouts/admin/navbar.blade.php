<div class="h-20 box-border">
    <div class="bg-slate-900 h-20 flex fixed w-4/5 text-white z-40 lgTablet:w-full">
        <h1 class="w-1/2 font-medium text-3xl my-auto ml-4">@yield('headerNav')</h1>
        <div class="w-1/2 relative" style="z-index: 2">
            <button class="absolute right-20 top-7 hover:text-slate-300" onclick="openDropdown()" id="dropdownTrigger">Hallo, {{ auth()->user()->nama }} <i class="HandPhone:hidden fa-solid fa-play scale-75" style="transition: transform 1s;" id="dropdownIcon"></i></button>
            <button onclick="showSidebar()" id="SidebarTrigger"><span class="hidden absolute right-10 top-7 scale-150 lgTablet:inline"><i id="IconSidebar" class="fa-solid fa-bars"></i></span></button>
            <div class="absolute right-4 top-14 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden" id="dropdownMenu">
                <ul>
                    <li><a href="#" class="block px-4 py-2 text-gray-800 font-outfit hover:bg-gray-200 hover:rounded-t-lg">Profile</a></li>
                    <li><a href="/logout" class="block px-4 py-2 text-gray-800 font-outfit hover:bg-gray-200 hover:rounded-b-lg">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <i class="fa-solid fa-xmark hidden"></i>
</div>
<div class="w-full h-30 bg-slate-900 text-red-800 ani">

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
        const SidebarMenu = document.getElementById("SidebarMenu")
        if( Sidebar.classList.contains("lgTablet:hidden")){
            Sidebar.classList.remove("lgTablet:hidden");
            Sidebar.classList.remove("lgTablet:animate-hideSidebar")
            Sidebar.classList.add("lgTablet:w-[35%]");
            Sidebar.classList.add("lgTablet:animate-showSidebar");
        }else{
            setTimeout(function() {
                Sidebar.classList.add("lgTablet:hidden")
            }, 400);
            Sidebar.classList.remove("lgTablet:animate-showSidebar");
            Sidebar.classList.add("lgTablet:animate-hideSidebar");
        }
    }
</script>

