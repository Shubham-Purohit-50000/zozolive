<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <x-brand-detail />
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div class="aside-menu my-4 " data-menu-dropdown-timeout="500" data-menu-scroll="1" data-menu-vertical="1" id="kt_aside_menu">
            <ul class="menu-nav ">
                {{ $slot }}
            </ul>
        </div>
    </div>
</div>