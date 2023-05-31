@props([
    'model',
    'url'           => null,
    'roleForCreate' => null
])
<h5 class="text-dark font-weight-bold my-1 mr-5">{{ $model }}</h5>
@if($url)
    @if($roleForCreate)
        @role($roleForCreate)
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                <li class="breadcrumb-item">
                    <a href="{{ url($url) }}" class="text-muted">
                        <i class="la la-arrow-left"></i>
                    </a>
                </li>
            </ul>
        @endrole
    @else
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ url($url) }}" class="text-muted">
                    <i class="la la-arrow-left"></i>
                </a>
            </li>
        </ul>
    @endif
@endif