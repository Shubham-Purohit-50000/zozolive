<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="roles" model="Role" />
    </x-slot>
    <x-form-body url="{{ 'roles/' . $role->uuid }}" method="PATCH">
        <x-form-input name="name" label="Name" oldValue="{{ $role->name }}" required="required" />
        <x-form-input name="display_name" label="Display Name" oldValue="{{ $role->display_name }}"
            required="required" />
        <x-form-input name="description" label="Description" oldValue="{{ $role->description }}" />
        {{-- <x-form-select name="permission_id" label="Permission" :selected="$old_permission"  :list="$permissions" ></x-form-select> --}}
    </x-form-body>
</x-layout>
