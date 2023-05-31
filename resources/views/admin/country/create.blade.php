<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="countries" model="Country" />
    </x-slot>
    <x-form-body route="countries.store" method="POST" col="8">
        <x-form-input name="name" required="required" />
        <x-form-input name="code" />
        <x-form-single-select name="is_active" :list="basicStatus()" required="required" />
    </x-form-body>
</x-layout>
