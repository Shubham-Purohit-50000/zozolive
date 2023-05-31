    <x-layout>
        <x-slot name="breadcrumb">
            <x-breadcrumb url="roles" model="Role" />
        </x-slot>
        <x-form-body route="roles.store" method="POST">
            <x-form-input name="name" label="Name" oldValue="{{ old('name') }}" required="required" />
            <x-form-input name="display_name" label="Display Name" oldValue="{{ old('display_name') }}"
                required="required" />
            <x-form-input name="description" label="Description" oldValue="{{ old('description') }}" />
            {{-- <x-form-select name="permission_id" label="Permission" :list="$permissions" ></x-form-select> --}}
        </x-form-body>
    </x-layout>
