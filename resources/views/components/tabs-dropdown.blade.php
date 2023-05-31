<div style="float:right;margin-left:{{ $margin ?? '400px' }}">
    <x-dropdown>
    <x-dropdown-item icon="cog" title="Setting" url="setting/{{ $uuid }}/edit"/>
    <x-dropdown-item icon="phone" title="Contact" url="contact/{{ $uuid }}/edit"/>
    <x-dropdown-item icon="info" title="Introduction" url="introduction/{{ $uuid }}/edit"/>
    <x-dropdown-item icon="users" title="Brand" url="brands/{{ $uuid }}"/>
    <x-dropdown-item icon="tasks" title="Service" url="services/{{ $uuid }}"/>
    <x-dropdown-item icon="question" title="FAQ" url="faqs/{{ $uuid }}"/>
    <x-dropdown-item icon="comments" title="Review" url="reviews/{{ $uuid }}"/>
    <x-dropdown-item icon="play" title="Gallery" url="gallery/{{ $uuid }}"/>
    {{-- <x-dropdown-item icon="calendar" title="Appointment" url="appointments/{{ $uuid }}"/> --}}
    <x-dropdown-item icon="shopping-cart" title="E-Gift Category" url="egift-categories/{{ $uuid }}"/>
    {{-- <x-dropdown-item icon="shopping-cart" title="E-Gift" url="egift/{{ $uuid }}"/> --}}
    </x-dropdown>
</div>