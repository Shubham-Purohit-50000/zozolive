@props([
    'name',
    'desc' => null,
    'active' => '',
    'tab' => null
])
<li class="nav-item">
    <a href="#" class="nav-link {{ $active }}" data-toggle="tab" data-target="#kt_header_tab_{{$tab}}" role="tab" aria-selected="true">
        <span class="nav-title text-uppercase">{{ $name }}</span>
        <span class="nav-desc">{{ $desc  }}</span>
    </a>
</li>