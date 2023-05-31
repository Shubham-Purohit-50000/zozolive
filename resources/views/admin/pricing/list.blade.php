<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Pricing"/>
    </x-slot>
    <x-table url="pricing/create">
        <thead>
        <tr>
            <x-table-heading name="#"/>
            <x-table-heading name="Plan Name"/>
            <x-table-heading name="Detail"/>
            <x-table-heading name="Minimum Token Limit"/>
            <x-table-heading name="Maximum Token Limit"/>
            <x-table-heading name="Action"/>
        </tr>
        </thead>
        <tbody>
        @foreach ($pricings as $pricing)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pricing->plan_name }}</td>
                <td>{{ $pricing->detail ?? 'N/A' }}</td>
                <td>{{ $pricing->minimum_token_limit ?? 'N/A' }}</td>
                <td>{{ $pricing->maximum_token_limit ?? 'N/A' }}</td>
                <td>
                    <x-table-action url="pricing" id="{{ $pricing->uuid }}" route="pricing"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </x-table>
</x-layout>
