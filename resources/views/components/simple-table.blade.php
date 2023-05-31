@props([
    'url' => null,
    'customCondtion' => null,
    'label' => 'Add New',
    'customCreateButton' => null,
])
<div class="">
    <div class="card-body">
        <table class="table table-separate table-head-custom text-capitalize table-checkable text-center">
            {{ $slot }}
        </table>
    </div>
</div>
