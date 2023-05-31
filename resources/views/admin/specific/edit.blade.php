<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="specifics" model="Specific" />
    </x-slot>
    <x-form-body url="{{ 'specifics/' . $specific->uuid }}" method="PATCH" col="8">
        <x-form-input name="name" required="required" oldValue="{{ $specific->name }}" />
        <x-form-textarea name="description" oldValue="{{ $specific->description }}" />
    </x-form-body>
</x-layout>
