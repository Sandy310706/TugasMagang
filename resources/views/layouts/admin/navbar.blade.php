<div class="h-20 box-border">
    <div class="bg-slate-900 h-20 flex fixed w-4/5 text-white z-50 lgTablet:w-full">
        <h1 class="w-1/2 font-medium text-3xl my-auto ml-4">@yield('headerNav')</h1>
        <div class="w-1/2 relative" style="z-index: 2">
            <button class="absolute right-20 top-7 hover:text-slate-300" onclick="openDropdown()" id="dropdownTrigger">Hallo, {{ auth()->user()->nama }} <i class="HandPhone:hidden fa-solid fa-play scale-75" style="transition: transform 1s;" id="dropdownIcon"></i></button>
            <span class="hidden absolute right-10 top-7 scale-150 tablet:inline"><i class="fa-solid fa-bars"></i></span>
            <div class="absolute right-4 top-14 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden" id="dropdownMenu">
                <ul>
                    <li><a href="#" class="block px-4 py-2 text-gray-800 font-outfit hover:bg-gray-200 hover:rounded-t-lg">Profile</a></li>
                    <li><a href="/logout" class="block px-4 py-2 text-gray-800 font-outfit hover:bg-gray-200 hover:rounded-b-lg">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
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
    // document.addEventListener("click", function (event) {
    //     if (
    //         !dropdownTrigger.contains(event.target) &&
    //         !dropdownMenu.contains(event.target)
    //     ) {
    //         setTimeout(function() {
    //             dropdownMenu.classList.add("hidden");
    //         } , 400);
    //         dropdownMenu.classList.add("animate-hideDropdownMenu");
    //         dropdownMenu.classList.remove("animate-showDropdownMenu");
    //         dropdownIcon.classList.toggle('rotate-90');
    //         dropdownIcon.classList.toggle('rotate-180');
    //     }
    // });
</script>

