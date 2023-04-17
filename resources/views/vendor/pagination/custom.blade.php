@if ($paginator->hasPages())
    <nav aria-label="Page navigation" class="paginator">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="btn page-link" href="#" tabindex="-1">Back</a>
                </li>
            @else
                <li class="page-item"><a class="btn btn-secondary no-border" href="{{ $paginator->previousPageUrl() }}">Back</a></li>
            @endif

            @if (is_array($elements ?? ''))
                @foreach ($elements ?? '' as $element)
                    @if (is_string($element))
                        <li class="page-item disabled">{{ $element }}</li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                    <a class="btn btn-secondary no-border page-link">{{ $page }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="btn btn-secondary no-border page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
            
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="btn btn-secondary no-border" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="btn page-link" href="#">Next</a>
                </li>
            @endif
        </ul>
    </nav>
@endif
