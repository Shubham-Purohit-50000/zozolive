<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="official-messages" model="Official Message" />
    </x-slot>
    <x-form-body route="official-messages.store" :upload="true" method="POST" col="8">
        <x-form-input name="title" required="required" />
        <x-form-input name="description" required="required" />
        <x-image-input name="image" />
    </x-form-body>
</x-layout>
