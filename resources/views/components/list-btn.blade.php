@props(['url', 'label' => 'Add New', 'icon' => 'plus'])
<a href="{{ url($url) }}" class="btn btn-sm btn-success font-weight-bold mx-2">
    <i class="la la-{{ $icon }}"></i>
    {{ $label }}
</a>
