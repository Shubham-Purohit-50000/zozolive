<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Country "/>
    </x-slot>
    <x-table url="countries/create">
        <thead>
        <tr>
            <x-table-heading name="#"/>
            <x-table-heading name="Name"/>
            <x-table-heading name="Code"/>
            <x-table-heading name="Is Active"/>
            <x-table-heading name="Action"/>
        </tr>
        </thead>
        <tbody>
        @foreach ($countries as $country)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $country->name }}</td>
                <td>{{ $country->code ?? 'N/A' }}</td>
                <td>
                    @if (currentUserId() != $country->uuid)
                        <x-link url="{{ 'update-country-status/' . $country->id }}"
                                title="{{ $country->is_active ? 'Yes' : 'No' }}"
                                class="{{ $country->is_active ? 'bg-success text-white' : 'bg-danger text-white' }}"></x-link>
                    @else
                        <span @class([ 'px-2 py-1 rounded font-weight-bold' , 'bg-success text-white'=>
                                $country->is_active,
                                'bg-danger text-white' => !$country->is_active
                                ])>{{ $country->is_active ? 'Yes' : 'No' }}</span>
                    @endif
                </td>
                <td>
                    <x-table-action url="countries" id="{{ $country->id }}" route="countries"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </x-table>
</x-layout>
