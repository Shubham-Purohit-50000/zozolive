<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Subculture"/>
    </x-slot>
    <x-table url="subcultures/create">
        <thead>
        <tr>
            <x-table-heading name="#"/>
            <x-table-heading name="Name"/>
            <x-table-heading name="Description"/>
            <x-table-heading name="Action"/>
        </tr>
        </thead>
        <tbody>
        @foreach ($subcultures as $subculture)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $subculture->name }}</td>
                <td>{{ $subculture->description ?? 'N/A' }}</td>
                <td>
                    <x-table-action url="subcultures" id="{{ $subculture->uuid }}" route="subcultures"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </x-table>
</x-layout>
