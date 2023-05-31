<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="languages" model="Language" />
    </x-slot>
    <x-form-body route="languages.store" method="POST" col="8">
        <x-form-input name="name" required="required" />
        <x-form-textarea name="description"  />
    </x-form-body>
</x-layout>
