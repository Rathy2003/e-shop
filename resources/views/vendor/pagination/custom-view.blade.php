@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center">

            {{-- Start Mobile Device --}}
{{--        <div class="flex justify-between flex-1 sm:hidden">--}}
{{--            @if ($paginator->onFirstPage())--}}
{{--                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">--}}
{{--                    {!! __('pagination.previous') !!}--}}
{{--                </span>--}}
{{--            @else--}}
{{--                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">--}}
{{--                    {!! __('pagination.previous') !!}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if ($paginator->hasMorePages())--}}
{{--                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">--}}
{{--                    {!! __('pagination.next') !!}--}}
{{--                </a>--}}
{{--            @else--}}
{{--                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">--}}
{{--                    {!! __('pagination.next') !!}--}}
{{--                </span>--}}
{{--            @endif--}}
{{--        </div>--}}
            {{-- End Mobile Device --}}

{{--        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">--}}
        <div class="flex items-center">
            <div >
                <div class="flex gap-3 items-center flex-wrap justify-center">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <a class="bg-white border border-black p-2 rounded cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="bg-white border border-black text-black hover:bg-black hover:text-white p-2 rounded cursor-pointer" aria-label="{{ __('pagination.previous') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <a class="bg-white border border-black text-black px-4 py-2 rounded select-none">...</a>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <a class="bg-black border border-black text-white px-4 py-2 rounded cursor-pointer">
                                        {{ $page }}
                                    </a>
                                @else
                                    <a href="{{ $url }}" class="bg-white border border-black text-black hover:bg-black hover:text-white px-4 py-2 rounded cursor-pointer" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="bg-white border border-black text-black hover:bg-black hover:text-white p-2 rounded cursor-pointer" aria-label="{{ __('pagination.next') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    @else
                        <a class="bg-white border border-black p-2 rounded cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endif
