<div class="container pt-3 pb-5 d-block d-md-none nav-links">
    {{ $news->links('custom_pagination.mobile_pagination') }}
</div>

<div class="container pt-3 pb-5 d-none d-md-block nav-links">
    {{ $news->onEachSide(1)->links() }}
</div>