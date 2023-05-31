<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="payment-gateway-details" model="Payment Gateway Detail" />
    </x-slot>
    <x-form-body route="payment-gateway-details.store">
        <x-form-single-select name="payment_gateway_name" selectId="4" required :list="paymentGateways()" />
        <x-form-input name="payment_gateway_key" required="required" />
        <x-form-input name="payment_gateway_secret" required="required" />
    </x-form-body>
</x-layout>
