<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="studios" model="Studio" />
    </x-slot>
    <x-form-body url="{{ 'studios/' . $agency->uuid }}" method="PATCH" col="8">
        <x-form-input name="name" oldValue="{{ $agency->user->name ?? '' }}" required="required" />
        <x-form-input name="mobile" type="number" oldValue="{{ $agency->mobile ?? '' }}" required="required" />
        <x-form-input name="email" label="E-Mail" oldValue="{{ $agency->user->email ?? '' }}" required />
        <x-password-input />
        <x-switch name="is_active" checked="{{ $agency->user->is_active ? 'checked' : '' }}" />
    </x-form-body>
    <x-slot name="js">
        <script src="{{ asset('js/toggle-password.js') }}"></script>
    </x-slot>
</x-layout>
