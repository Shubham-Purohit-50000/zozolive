<div class="card card-custom gutter-b" style="{{ $style ?? '' }}">
    @isset($header)
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">
            {{ $header ?? NULL}}
            </h3>
        </div>
    </div>
    @endisset
    <div class="card-body {{ $classes ?? '' }}">
        {{ $slot }}
    </div>
</div>