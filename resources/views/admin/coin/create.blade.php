<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="coins" model="Token Plan" />
    </x-slot>
    <x-form-body route="coins.store" :upload="true" method="POST">
        <x-form-single-select name="type" selectId="4" required :list="packageType()" />
        <x-form-input name="amount" type="number" required="required" />
        <x-form-input name="discount" required="required" />
        <x-form-input name="coin" type="number" required="required" />
    </x-form-body>
</x-layout>
