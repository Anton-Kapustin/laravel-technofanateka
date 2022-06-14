<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>
@if ($paginator->hasPages())
  <nav >
    <style>
      #pagination-links {
        background: linear-gradient(90deg, rgba(25,0,48,1) 0%, rgba(30,1,46,1) 49%, rgba(28,0,31,1) 100%);;
      }
    </style>
    @if ($paginator->lastPage() > 1)
        <ul class="pagination justify-content-center">
            <li class="page-item {{ ($paginator->currentPage() == 1) ? 'text-muted disabled' : '' }}">
                <a class="page-link " href="{{ $paginator->url(1) }}" id="pagination-links">&lsaquo;&lsaquo;</a>
             </li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
                $half_total_links = floor($link_limit / 2);
                $from = $paginator->currentPage() - $half_total_links;
                $to = $paginator->currentPage() + $half_total_links;
                if ($paginator->currentPage() < $half_total_links) {
                   $to += $half_total_links - $paginator->currentPage();
                }
                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
                ?>
                @if ($from < $i && $i < $to)
                    <li class="page-item {{ ($paginator->currentPage() == $i) ? 'disabled text-light' : '' }}">
                        <a class="page-link" href="{{ $paginator->url($i) }}" id="pagination-links">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            <li class=" page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? 'text-muted disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" id="pagination-links">&rsaquo;&rsaquo;</a>
            </li>
        </ul>
    @endif
  </nav>
@endif
