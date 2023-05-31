<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="pricing" model="Pricing" />
    </x-slot>
    <x-form-body url="{{ 'pricing/'.$pricing->uuid }}" method="PATCH" col="8">
        <x-form-input name="plan_name" required="required" :oldValue="$pricing->plan_name" />
        <x-form-input name="detail" :oldValue="$pricing->detail" />
        <x-form-input name="minimum_token_limit" :oldValue="$pricing->minimum_token_limit" required="required" />
        <x-form-input name="maximum_token_limit" :oldValue="$pricing->maximum_token_limit" required="required" />
    </x-form-body>
</x-layout>
