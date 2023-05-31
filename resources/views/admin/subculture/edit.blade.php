<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="subcultures" model="Subculture" />
    </x-slot>
    <x-form-body url="{{ 'subcultures/' . $subculture->uuid }}" method="PATCH" col="8">
        <x-form-input name="name" required="required" oldValue="{{ $subculture->name }}" />
        <x-form-textarea name="description" oldValue="{{ $subculture->description }}" />
    </x-form-body>
</x-layout>
