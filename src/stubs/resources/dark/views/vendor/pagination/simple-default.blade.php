@if ($paginator->hasPages())
    <nav>
        <div dir="ltr" class="flex font-roboto">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="py-2 px-4 leading-tight bg-gray-800 border border-gray-700 text-blue-200 border-r-0 ml-0 rounded-l" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">Previous</span>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center mr-1 px-3 py-2 bg-gray-200 text-gray-700 hover:bg-gray-700 hover:text-gray-200 rounded-lg">
                    <span rel="prev" aria-label="@lang('pagination.previous')">Previous</span>
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="py-2 px-4 leading-tight bg-gray-800 border border-gray-700 text-blue-200 border-r rounded-r hover:bg-blue-500 hover:text-white">
                    <span rel="next" aria-label="@lang('pagination.next')">Next</span>
                </a>
            @else
                <a class="py-2 px-4 leading-tight bg-gray-800 border border-gray-700 text-blue-200 border-r rounded-r" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">Next</span>
                </a>
            @endif
        </div>
    </nav>
@endif
