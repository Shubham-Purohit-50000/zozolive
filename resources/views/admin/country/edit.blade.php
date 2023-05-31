<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="countries" model="Country" />
    </x-slot>
    <x-form-body url="{{ 'countries/'.$country->id }}" method="PATCH" col="8">
        <x-form-input name="name" required="required" :oldValue="$country->name" />
        <x-form-input name="code" :oldValue="$country->code" />
        <x-form-single-select name="is_active" :list="basicStatus()" :selected="$country->is_active" required="required" />
    </x-form-body>
</x-layout>
