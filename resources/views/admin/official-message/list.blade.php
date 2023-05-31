<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Offical Message" />
    </x-slot>
    <x-table url="official-messages/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Title" />
                <x-table-heading name="Description" />
                <x-table-heading name="Image" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $message->title }}</td>
                    <td>{{ $message->description }}</td>
                    <td>
                        @if ($message->image)
                            <x-file-icon url="{{ Storage::url($message->image) }}" />
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <x-table-action url="official-messages" id="{{ $message->uuid }}" route="official-messages" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
