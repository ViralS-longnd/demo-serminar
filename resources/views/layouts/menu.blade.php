
<li class="{{ Request::is('admin/products*') ? 'active' : '' }}">
    <a href="{!! route('products.show.search') !!}">
        <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA"></i>
        Search Product
    </a>
</li>

