
@if ($paginator->hasPages())
    {{-- <div class="row float-right"> --}}
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item  disabled"><span class="page-link" > < </span></li>
            @else
                <li class="page-item "><a class="page-link" href="{{ $paginator->previousPageUrl().'&chk_list='.$chk_list.'&list_sku='.$data_sku.'&list_product_year='.$data_product_year.'&list_category='.$data_category.'&list_catalog_status='.$data_catalog_status.'&list_age='.$data_age.'&list_award='.$data_award }}" rel="prev"> < </a></li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item "><span class="page-link">{{ $element }}</span></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active page-item"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link"  href="{{ $url.'&chk_list='.$chk_list.'&list_sku='.$data_sku.'&list_product_year='.$data_product_year.'&list_category='.$data_category.'&list_catalog_status='.$data_catalog_status.'&list_age='.$data_age.'&list_award='.$data_award }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl().'&chk_list='.$chk_list.'&list_sku='.$data_sku.'&list_product_year='.$data_product_year.'&list_category='.$data_category.'&list_catalog_status='.$data_catalog_status.'&list_age='.$data_age.'&list_award='.$data_award }}" rel="next"> > </a></li>
            @else
                <li class="disabled"><span class="page-link"> > </span></li>
            @endif
        </ul>
    {{-- </div> --}}
@endif
