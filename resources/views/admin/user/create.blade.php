<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="users" model="User" />
    </x-slot>
    <x-slot name="css">
        <x-select-css />
    </x-slot>
    <x-form-body route="users.store" method="POST">
        <x-form-input name="name" oldValue="{{ old('name') }}" required="required" />
        <x-form-input name="email" label="E-Mail" oldValue="{{ old('email') }}" />
        <x-form-input name="password" type="password" label="Password" oldValue="{{ old('password') }}" />
        <x-form-single-select name="role_id" label="Role" :list="$roles" />
        <x-switch name="is_active" checked="checked" />
    </x-form-body>
    <x-slot name="js">
        <script src="{{ asset('js/toggle-password.js') }}"></script>
    </x-slot>
</x-layout>
