<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Specifics"/>
    </x-slot>
    <x-table url="specifics/create">
        <thead>
        <tr>
            <x-table-heading name="#"/>
            <x-table-heading name="Name"/>
            <x-table-heading name="Description"/>
            <x-table-heading name="Action"/>
        </tr>
        </thead>
        <tbody>
        @foreach ($specifics as $specific)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $specific->name }}</td>
                <td>{{ $specific->description ?? 'N/A' }}</td>
                <td>
                    <x-table-action url="specifics" id="{{ $specific->uuid }}" route="specifics"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </x-table>
</x-layout>
