<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Interest" />
    </x-slot>
    <x-table url="interests/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Title" />
                <x-table-heading name="Description" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($interests as $interest)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $interest->title }}</td>
                    <td>{{ $interest->description ?? 'N/A' }}</td>
                    <td>
                        <x-table-action url="interests" id="{{ $interest->uuid }}" route="interests" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
