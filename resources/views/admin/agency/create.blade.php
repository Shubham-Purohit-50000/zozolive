<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="studios" model="Studio" />
    </x-slot>
    <x-slot name="css">
        <x-select-css />
    </x-slot>
    <x-form-body route="studios.store" method="POST" col="8">
        <x-form-input name="name" oldValue="{{ old('name') }}" required="required" />
        <x-form-input name="mobile" type="number" oldValue="{{ old('mobile') }}" required="required"/>
        <x-form-input name="email" label="E-Mail" oldValue="{{ old('email') }}" required />
        <x-password-input />
        <x-switch name="is_active" />
    </x-form-body>
    <x-slot name="js">
        <script src="{{ asset('js/toggle-password.js') }}"></script>
    </x-slot>
</x-layout>
