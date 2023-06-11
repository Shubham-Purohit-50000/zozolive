@props([
    'url' => null,
    'customCondtion' => null,
    'label' => 'Add New',
    'lable2' => null,
    'customCreateButton' => null,
    'title' => 'List',
])
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-header-icon mr-2">
                <i class="flaticon2-chat-1 text-success"></i>
            </span>
            <h3 class="card-label">
                {{ $title }}
            </h3>
        </div>
        <div class="card-toolbar">
            @if ($url)
                @isset($customCondtion)
                    @if ($customCondtion)
                        <x-list-btn url="{{ $url }}" label="{{ $label }}" />
                    @endif
                @else
                    <x-list-btn url="{{ $url }}" label="{{ $label }}" />
                @endisset
            @endif
            {{ $customCreateButton }}
        </div>
    </div>
    <div class="card-body">
        <table class="table table-separate table-head-custom text-capitalize table-checkable text-center"
            id="kt_datatable1">
            {{ $slot }}
        </table>
    </div>
</div>
