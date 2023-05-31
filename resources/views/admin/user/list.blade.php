<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Users" />
    </x-slot>
    <x-table url="users/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Name" />
                <x-table-heading name="E-Mail" />
                <x-table-heading name="Role" />
                <x-table-heading name="Is Active" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="text-lowercase">{{ $user->email }}</td>
                    <td class="text-lowercase">{{ $user->role->name ?? '' }}</td>
                    <td>
                        @if (currentUserId() != $user->uuid)
                            <x-link url="{{ 'update-user-status/' . $user->uuid }}"
                                title="{{ $user->is_active ? 'Yes' : 'No' }}"
                                class="{{ $user->is_active ? 'bg-success text-white' : 'bg-danger text-white' }}" />
                        @else
                            <span @class([ 'px-2 py-1 rounded font-weight-bold' , 'bg-success text-white'=>
                                $user->is_active,
                                'bg-danger text-white' => !$user->is_active
                                ])>{{ $user->is_active ? 'Yes' : 'No' }}</span>
                        @endif
                    </td>
                    <td nowrap>
                        @if (Auth::user()->hasRole('super-admin') && Auth::id()!=$user->uuid)
                            <div class="d-flex justify-content-center">
                                {{ Form::open(['method' => 'delete', 'route' => ['users.destroy', $user->uuid], 'onsubmit' => 'delete_confirm()']) }}
                                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                                    <i class="la la-trash"></i>
                                </button>
                                {{ Form::close() }}
                                <a href="{{ route('users.edit', $user->uuid) }}"
                                    class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                                    <i class="la la-edit"></i>
                                </a>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
