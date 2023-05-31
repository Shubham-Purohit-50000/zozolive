<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="users" model="User" />
    </x-slot>
    <x-form-body url="{{ 'users/' . $user->uuid }}" method="PATCH">
        <x-form-input name="name" label="Name" oldValue="{{ $user->name }}" required="required" />
        <x-form-input name="email" label="E-Mail" oldValue="{{ $user->email }}" />
        <x-form-input name="password" type="password" label="Password" oldValue="{{ old('password') }}" />
        @if (currentUserId() != $user->uuid)
            <x-form-single-select name="role_id" label="Role" :list="$roles" :selected="$user->role_id" />
        @endif
        <x-switch name="is_active" checked="{{ $user->is_active ? 'checked' : '' }}" />
    </x-form-body>
</x-layout>
