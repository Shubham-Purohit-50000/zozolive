<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Language" />
    </x-slot>
    <x-table url="languages/create">
        <thead>
        <tr>
            <x-table-heading name="#" />
            <x-table-heading name="Name" />
            <x-table-heading name="Description" />
            <x-table-heading name="Action" />
        </tr>
        </thead>
        <tbody>
        @foreach ($languages as $language)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $language->name }}</td>
                <td>{{ $language->description ?? 'N/A' }}</td>
                <td>
                    <x-table-action url="languages" id="{{ $language->uuid }}" route="languages" />
                </td>
            </tr>
        @endforeach
        </tbody>
    </x-table>
</x-layout>
