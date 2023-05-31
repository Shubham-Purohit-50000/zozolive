@props([
    'slot' => null,
    'title',
    'url' => '',
    'class' => '',
    'icon' => 'home'
])
<li aria-haspopup="true" class="menu-item menu-item-submenu {{request()->routeIs($url.'.*') ? 'menu-item-here menu-item-open' : ''}}" data-menu-toggle="hover">
    <a class="menu-link menu-toggle {{request()->routeIs($url.'.*') ? 'menu-item-active' : ''}}" href="{{ url($url) }}">
        <i class="menu-icon {{ 'la la-'.$icon }}">
        </i>
        <span class="menu-text">
            {{ $title }}
        </span>
    </a>
</li>