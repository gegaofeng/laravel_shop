@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="paginate_button disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" onclick="return false">
                <a class="paginate_button" aria-hidden="true" onclick="return false">上一页</a>
            </li>
        @else
            <li class="paginate_button">
                <a class="paginate_button" rel="prev" aria-label="@lang('pagination.previous')" onclick="ajax_get_goods_list({{$paginator->currentpage()-1}})">上一页</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="paginate_button disabled" aria-disabled="true"><a class="paginate_button">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button active" aria-current="page"><a class="paginate_button" onclick="ajax_get_goods_list({{$page}})">{{ $page }}</a></li>
                    @else
                        <li class="paginate_button"><a class="paginate_button" href="javascript:void(0)" onclick="ajax_get_goods_list({{$page}})">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="paginate_button">
                <a class="paginate_button" onclick="ajax_get_goods_list({{$paginator->currentpage()+1}})" rel="next" aria-label="@lang('pagination.next')">下一页</a>
            </li>
        @else
            <li class="paginate_button disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="paginate_button" aria-hidden="true" href="javascript:void(0)">下一页</a>
            </li>
        @endif
    </ul>
@endif
<style>
    .disabled{
        cursor: not-allowed;
        pointer-events:none
    }
    </style>
