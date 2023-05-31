<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="interests" model="Interest" />
    </x-slot>
    <x-form-body route="interests.store" method="POST" col="8">
        <x-form-input name="title" required="required" />
        <x-form-textarea name="description"  />
    </x-form-body>
</x-layout>
