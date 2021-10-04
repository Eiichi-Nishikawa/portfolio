@if ($paginator->hasPages())
    <div class="ui pagination menu" role="navigation">
    <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="list-item"><a aria-disabled="true"> {{ ('<') }} </a></li>
        @else
        <li class="list-item"><a class="icon item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> {{ ('<') }} </a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="list-item"><a class="icon item disabled" aria-disabled="true">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="list-item"><a class="item active" href="{{ $url }}" aria-current="page">{{ $page }}</a></li>
                    @else
                    <li class="list-item"><a class="item" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="list-item"><a class="icon item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> {{ ('>') }} </a></li>
        @else
            <li class="list-item"><a class="icon item disabled" aria-disabled="true"> {{ ('>') }} </a></li>
        @endif
    </ul>
    </div>
@endif
