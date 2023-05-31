@props([
    'col'       => 6,
    'method'    => 'POST',
    'url'       => null,
    'route'     => null,
    'upload'    => false,
    'title'     => 'Details',
    'showHeader'=> true
])
<div class="row">
    <div class="col-md-{{$col}}">
        <div class="card card-custom gutter-b">
            @if($showHeader)
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{ $title }}
                        </h3>
                    </div>
                </div>  
            @endif
            {!! Form::open([
                'method'=> $method,
                'route' => $route,
                'url'   => $url,
                'files' => $upload,
                'class' => 'kt-form',
            ]) !!}
            <div class="card-body">
                {{ $slot }}
            </div>
                <x-form-button />
            {!!Form::close()!!}
        </div>
    </div>
    {{ $extraData ?? null}}   
</div>