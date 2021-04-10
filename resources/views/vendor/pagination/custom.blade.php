@if ($paginator->hasPages())
    <nav class="pagination pagination-custom">
        <ul class="pagination works-pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li class="pagination-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="pagination-link">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination-item disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-item item-active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li class="pagination-item"><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="pagination-link">&raquo;</a>
                </li>
            @else
                <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif

@push('styles')
<style>
    /* Pagination */
    .pagination-custom {
        justify-content: center;
    }
    .pagination-item {
        padding: 10px 17px;
        transition: 0.3s ease;
        text-decoration: none;
        color: #1f1f1f;
    }
    .pagination-item:hover {
        background-color: #ebebeb;
        color: #1f1f1f;
        transform: scale(1.1);
        box-shadow: 0px 4px 6px 0px rgb(0, 0, 0, 0.2);
    }
    .pagination-link, .pagination-link:hover {
        color: #1f1f1f;
        text-decoration: none;
    }
    .item-active {
        background-color: #3ec1d5;
        color: #ebebeb;
        font-weight: bolder;
        box-shadow: 0px 4px 6px 0px rgb(0, 0, 0, 0.2);
    }
</style>
@endpush