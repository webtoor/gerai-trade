@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp
{{-- 
<li class="nav-item mT-30">
    <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.dash') ? 'active' : '' }}" href="{{ route(ADMIN . '.dash') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.users.index') }}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-user"></i>
        </span>
        <span class="title">Users</span>
    </a>
</li> --}}


<li class="nav-item mT-30">
    <a class="sidebar-link" href="{{ route('admin-panel.admin') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route('admin-panel.kelola-kategori') }}">
        <span class="icon-holder">
            <i class="c-orange-500 ti-layers-alt"></i>
        </span>
        <span class="title">Kelola Kategori</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ route('admin-panel.kelola-produk') }}">
        <span class="icon-holder">
            <i class="c-purple-500 ti-shopping-cart"></i>
        </span>
        <span class="title">Kelola Produk</span>
    </a>
</li>
  <li class="nav-item dropdown">
    <a class="dropdown-toggle" href="javascript:void(0);">
      <span class="icon-holder">
          <i class="c-green-500 ti-user"></i>
        </span>
      <span class="title">Kelola User</span>
      <span class="arrow">
          <i class="ti-angle-right"></i>
        </span>
    </a>
    <ul class="dropdown-menu">
      <li>
        <a class='sidebar-link'href="{{ route('admin-panel.showMember') }}" style="font-size:14px;margin-left:10px;">Member</a>
      </li>                 
      <li>
        <a class='sidebar-link'  href="{{ route('admin-panel.showMitra') }}"  style="font-size:14px;margin-left:10px;">Hub</a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="sidebar-link" href="{{ route('admin-panel.kelola-blog') }}">
        <span class="icon-holder">
            <i class="c-red-500 ti-blackboard"></i>
        </span>
        <span class="title">Kelola Cerita</span>
    </a>
</li>

<li class="nav-item">
        <a class="sidebar-link" href="{{ route('admin-panel.getPesan') }}">
            <span class="icon-holder">
                <i class="c-gray-500 ti-layout-placeholder"></i>
            </span>
            <span class="title">Pesan</span>
        </a>
    </li>
