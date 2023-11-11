<!-- resources/views/vendor/pagination/tailwind.blade.php -->

@if ($paginator->hasPages())
    <ul class="flex justify-between">
        {{-- Tombol "Halaman Sebelumnya" --}}
        @if ($paginator->onFirstPage())
            <li class="relative inline-flex items-center px-2 py-1 text-sm font-outfit text-gray-300 cursor-not-allowed">
                &laquo; Sebelumnya
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-1 text-sm font-outfit text-blue-500 hover:text-blue-700">
                    &laquo; Sebelumnya
                </a>
            </li>
        @endif

        {{-- Tautan Halaman --}}
        @foreach ($elements as $element)
            {{-- Jika tautan adalah angka halaman --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="relative rounded-md inline-flex items-center mx-1 px-3 py-1 text-sm font-semibold text-white bg-blue-800 hover:bg-blue-900">
                            {{ $page }}
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="relative inline-flex items-center px-3 py-1 text-sm font-semibold text-black rounded-md mx-1 hover:text-blue-700">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol "Halaman Selanjutnya" --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-1 text-sm font-outfit text-blue-500 hover:text-blue-700">
                    Selanjutnya &raquo;
                </a>
            </li>
        @else
            <li class="relative inline-flex items-center px-2 py-1 text-sm font-outfit text-gray-300 cursor-not-allowed">
                Selanjutnya &raquo;
            </li>
        @endif
    </ul>
@endif
