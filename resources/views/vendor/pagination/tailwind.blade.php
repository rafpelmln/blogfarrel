@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-8">
        <ul class="inline-flex items-center space-x-2">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 text-sm text-gray-400 bg-[#F8F3D9] rounded-full cursor-not-allowed">
                        ←
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-4 py-2 text-sm bg-[#504B38] text-[#F8F3D9] rounded-full hover:bg-[#3d3928] transition">
                        ←
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Dots --}}
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 text-sm text-gray-500">...</span>
                    </li>
                @endif

                {{-- Page Number --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-4 py-2 text-sm font-semibold rounded-full bg-[#F8F3D9] text-[#504B38] shadow-md">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-4 py-2 text-sm rounded-full text-[#504B38] hover:bg-[#F8F3D9] transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-4 py-2 text-sm bg-[#504B38] text-[#F8F3D9] rounded-full hover:bg-[#3d3928] transition">
                        →
                    </a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 text-sm text-gray-400 bg-[#F8F3D9] rounded-full cursor-not-allowed">
                        →
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
