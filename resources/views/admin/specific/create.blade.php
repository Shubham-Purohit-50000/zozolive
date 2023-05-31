<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="specifics" model="Specific" />
    </x-slot>
    <x-form-body route="specifics.store" method="POST" col="8">
        <x-form-input name="name" required="required" />
        <x-form-textarea name="description"  />
    </x-form-body>
</x-layout>
