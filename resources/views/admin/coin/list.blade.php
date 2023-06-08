<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Token Plans" />
    </x-slot>
    <x-table url="coins/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Type" />
                <x-table-heading name="Amount" />
                <x-table-heading name="Discount" />
                <x-table-heading name="Coin" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($coins as $coin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ packageType()[$coin->type] }}</td>
                    <td>{{ $coin->amount }}</td>
                    <td>{{ $coin->discount }}</td>
                    <td>{{ $coin->coin }}</td>
                    <td>
                        <x-table-action url="coins" id="{{ $coin->uuid }}" route="coins" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
