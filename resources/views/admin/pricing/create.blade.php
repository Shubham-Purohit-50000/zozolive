<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="pricing" model="Pricing" />
    </x-slot>
    <x-form-body route="pricing.store" method="POST" col="8">
        <x-form-input name="plan_name" required="required" />
        <x-form-input name="detail" />
        <x-form-input name="minimum_token_limit" required="required" />
        <x-form-input name="maximum_token_limit" required="required" />
    </x-form-body>
</x-layout>
