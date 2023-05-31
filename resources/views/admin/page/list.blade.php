<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Page" />
    </x-slot>
    <x-table url="pages/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Title" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $page->title }}</td>
                    <td>
                        <x-table-action url="pages" id="{{ $page->uuid }}" route="pages" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
