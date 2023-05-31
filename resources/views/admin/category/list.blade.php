<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Host Category" />
    </x-slot>
    <x-table url="category/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Title" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        <x-table-action url="category" id="{{ $category->uuid }}" route="category" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
