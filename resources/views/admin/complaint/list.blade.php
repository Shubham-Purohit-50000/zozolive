<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Complaints" />
    </x-slot>
    <x-table>
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="User Id" />
                <x-table-heading name="Host User Id" />
                <x-table-heading name="Description" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($complains as $complain)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $complain->user->user_id ?? '' }}</td>
                    <td>{{ $complain->host->user->user_id ?? '' }}</td>
                    <td clas>{{ $complain->description }}</td>
                    <td>
                        <x-table-action id="{{ $complain->uuid }}" route="complaints" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
