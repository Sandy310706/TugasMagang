<div class="h-20 box-border">
    <div class="bg-slate-900 h-20 flex fixed w-4/5 text-white z-50 HandPhone:w-full">
        <h1 class="w-1/2 font-medium text-3xl my-auto ml-4">@yield('headerNav')</h1>
        <div class="w-1/2 relative" style="z-index: 2">
            <button class="absolute right-20 top-7  hover:text-slate-300 " id="dropdownTrigger">Hallo, {{ auth()->user()->nama }} <i class="fa-solid fa-play scale-75" style="transition: transform 1s;" id="dropdownIcon"></i></i></button>
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
    const dropdownTrigger = document.getElementById("dropdownTrigger");
    const dropdownMenu = document.getElementById("dropdownMenu");
    const dropdownIcon = document.getElementById('dropdownIcon');

    dropdownTrigger.addEventListener("click", function () {
        dropdownMenu.classList.toggle("hidden");
        dropdownMenu.classList.add("animate-showDropdownMenu");
        dropdownMenu.classList.remove("animate-hideDropdownMenu");
        dropdownIcon.classList.toggle('rotate-90');
        dropdownIcon.classList.toggle('rotate-180');
    });
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
            dropdownIcon.classList.toggle('rotate-90');
            dropdownIcon.classList.toggle('rotate-180');
        }
    });
</script>

