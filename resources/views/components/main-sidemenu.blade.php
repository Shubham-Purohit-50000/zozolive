@props([
    'name',
    'icon' => 'users',
    'currentUrl' => explode('.',Route::current()->getName())[0],
    'url' => []
])
<li aria-haspopup="true" class="menu-item menu-item-submenu {{ (in_array($currentUrl,$url)) ? 'menu-item-here menu-item-open' : ''}}" data-menu-toggle="hover">
    <a class="menu-link menu-toggle" href="javascript:;">
        <i class="menu-icon la la-{{ $icon }}">
        </i>
        <span class="menu-text">
            {{ $name }}
        </span>
        <i class="menu-arrow">
        </i>
    </a>
    <div class="menu-submenu ">
        <i class="menu-arrow">
        </i>
        <ul class="menu-subnav">
            <li aria-haspopup="true" class="menu-item menu-item-parent">
                <span class="menu-link">
                    <span class="menu-text">
                        {{ $name }}
                    </span>
                </span>
            </li>
            {{ $submenu ?? null }}
        </ul>
    </div>
</li>
