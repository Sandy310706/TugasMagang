<div class="relative w-full h-20">
    <div class="bg-slate-900 h-20 flex fixed w-full">
        <h1 class="text-white font-medium text-3xl my-auto ml-4">@yield('headerNav')</h1>
        <button class="absolute mobile:hidden right-20 top-7 hover:text-slate-300" onclick="openDropdown()" id="dropdownTrigger">Hallo, {{ auth()->user()->nama }} <i class="HandPhone:hidden fa-solid fa-play scale-75" style="transition: transform 1s;" id="dropdownIcon"></i></button>
    </div>
    <div class="absolute right-4 top-14 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden" id="dropdownMenu">
        <ul>
            <li><a href="/ubahpassword/{{ auth()->user()->nama }}" class="block px-4 py-2 text-gray-800 font-outfit hover:bg-gray-200 hover:rounded-t-lg">Ubah Password</a></li>
            <li><a href="/logout" class="block px-4 py-2 text-gray-800 font-outfit hover:bg-gray-200 hover:rounded-b-lg">Logout</a></li>
        </ul>
    </div>
</div>
