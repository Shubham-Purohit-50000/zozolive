<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Model" />
    </x-slot>
    <x-table url="term-of-use/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Title" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody x-data="init()">
            @foreach ($results as $host)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $host->title ?? '' }}</td>
                    
                    <td>
                        <x-table-action url="term-of-use" id="{{ $host->uuid }}" route="term-of-use">
                            
                        </x-table-action>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
