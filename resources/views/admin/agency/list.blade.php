<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Studio" />
    </x-slot>
    <x-table url="studios/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Name" />
                <x-table-heading name="E-Mail" />
                <x-table-heading name="Mobile" />
                <x-table-heading name="Code" />
                <x-table-heading name="Is Active" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody x-data="init()">
            @foreach ($agencies as $agency)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $agency->user->name ?? '' }}</td>
                    <td class="text-lowercase">{{ $agency->user->email ?? '' }}</td>
                    <td>{{ $agency->mobile ?? '' }}</td>
                    <td>{{ $agency->code ?? '' }}</td>
                    <td>
                        <x-link url="{{ 'update-user-status/' . optional($agency->user)->uuid }}"
                            title="{{ optional($agency->user)->is_active ? 'Yes' : 'No' }}"
                            class="{{ optional($agency->user)->is_active ? 'bg-success text-white' : 'bg-danger text-white' }}" />
                    </td>
                    <td>
                        <x-table-action url="studios" id="{{ $agency->uuid }}" route="studios">
                            <x-slot name="custombtn">
                                <a href="{{ url("studios/$agency->uuid") }}" class="btn btn-sm btn-clean btn-icon btn-icon-md dropdown-item"
                                    title="Detail">
                                    <i class="la la-eye"></i>
                                </a>
                            </x-slot>
                        </x-table-action>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
