<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="subcultures" model="Subculture" />
    </x-slot>
    <x-form-body route="subcultures.store" method="POST" col="8">
        <x-form-input name="name" required="required" />
        <x-form-textarea name="description"  />
    </x-form-body>
</x-layout>
