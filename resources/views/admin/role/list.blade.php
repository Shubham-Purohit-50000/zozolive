<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Roles" />
    </x-slot>
    <x-table url="roles/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Name" />
                <x-table-heading name="Display Name" />
                {{-- <x-table-heading name="Permission"/> --}}
                <x-table-heading name="Description" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-lowercase">{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    {{-- <td>
						@foreach ($role->permissions as $k => $permission)
							{{(count($role->permissions)-1 == $k || count($role->permissions)< 1) ?  $permission->name : $permission->name. ','  }}                            
						@endforeach
					</td> --}}
                    <td>{{ $role->description }}</td>
                    <td>
                        <x-table-action url="roles" id="{{ $role->uuid }}" route="roles" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
