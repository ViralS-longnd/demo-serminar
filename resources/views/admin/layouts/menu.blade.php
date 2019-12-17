<li class="{{ Request::is('admin/duy/longs*') ? 'active' : '' }}">
    <a href="{!! route('admin.duy.longs.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="desktop" data-size="18"
               data-loop="true"></i>
               Longs
    </a>
</li>

<li class="{{ Request::is('admin/tests*') ? 'active' : '' }}">
    <a href="{!! route('admin.tests.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="home" data-size="18"
               data-loop="true"></i>
               Tests
    </a>
</li>

<li class="{{ Request::is('admin/test2s*') ? 'active' : '' }}">
    <a href="{!! route('admin.test2s.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="bell" data-size="18"
               data-loop="true"></i>
               Test2s
    </a>
</li>

