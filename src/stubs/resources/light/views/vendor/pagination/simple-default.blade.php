@if ($paginator->hasPages())
    <nav>
        <div class="flex rounded">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="py-2 px-4 leading-tight bg-white border border-gray-200 text-blue-700 border-r-0 ml-0 rounded-l" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">Previous</span>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="fpy-2 px-4 leading-tight bg-white border border-gray-200 text-blue-700 border-r-0 hover:bg-blue-500 hover:text-white">
                    <span rel="prev" aria-label="@lang('pagination.previous')">Previous</span>
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-blue-700 border-r hover:bg-blue-500 hover:text-white rounded-r">
                    <span rel="next" aria-label="@lang('pagination.next')">Next</span>
                </a>
            @else
                <a class="py-2 px-4 leading-tight bg-white border border-gray-200 text-blue-700 border-r" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">Next</span>
                </a>
            @endif
        </div>
    </nav>
@endif
