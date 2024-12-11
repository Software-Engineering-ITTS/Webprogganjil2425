@if ($paginator->hasPages())
    <div class="flex flex-col items-center">
        <!-- Help text -->
        <span class="text-sm text-gray-700 dark:text-gray-400">
            Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->firstItem() }}</span> to
            <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->lastItem() }}</span> of
            <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span> Entries
        </span>

        <!-- Pagination Buttons -->
        <div class="inline-flex mt-2 xs:mt-0">
            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <button
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-blue-700 dark:text-gray-400 dark:bg-gray-800 rounded-s cursor-not-allowed">
                    Prev
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-blue-600 rounded-s hover:bg-blue-700 dark:bg-blue-600 dark:border-blue-500 dark:hover:bg-blue-700 dark:hover:text-white">
                    Prev
                </a>
            @endif

            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-blue-600 border-0 border-s border-blue-500 rounded-e hover:bg-blue-700 dark:bg-blue-600 dark:border-blue-500  dark:hover:bg-blue-700 dark:hover:text-white">
                    Next
                </a>
            @else
                <button
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-blue-700 dark:text-gray-400 dark:bg-gray-800 rounded-e cursor-not-allowed">
                    Next
                </button>
            @endif
        </div>
    </div>
@endif
