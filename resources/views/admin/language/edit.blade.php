<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="languages" model="Language" />
    </x-slot>
    <x-form-body url="{{ 'languages/' . $language->uuid }}" method="PATCH" col="8">
        <x-form-input name="name" required="required" oldValue="{{ $language->name }}" />
        <x-form-textarea name="description" oldValue="{{ $language->description }}" />
    </x-form-body>
</x-layout>
