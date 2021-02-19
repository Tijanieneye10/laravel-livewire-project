@if($paginator->hasPages())
<ul class="pagination" style="cursor: pointer">
    {{-- Prev start --}}
    @if ($paginator->onFirstPage())
    <li class="page-item page-link bg-gray" style="cursor: none">Previous</li>
    @else
    <li class="page-item page-link" wire:click="previousPage">Previous</li>
    @endif
    {{-- Prev stop --}}

    {{-- Number start --}}
    @if (is_array($elements))
    @foreach ($elements as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="page-item page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</li>
    @else
    <li class="page-item page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</li>
    @endif
    @endforeach
    @else
    @endif
    <li class="page-item page-link">1</li>
    {{-- Number end --}}

    {{-- Next start --}}
    @if ($paginator->hasMorePages())
    <li class="page-item page-link bg-gray" wire:click="nextPage">Next</li>
    @else
    <li class="page-item page-link" style="cursor: none">Next</li>
    @endif
    {{-- Next end --}}
</ul>
@endif
