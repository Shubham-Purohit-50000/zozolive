<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Payment Gateway Details" />
    </x-slot>
    <x-table url="payment-gateway-details/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Payment Gateway Name" />
                <x-table-heading name="Key" />
                <x-table-heading name="Secret" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($payment_gateway_details as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ paymentGateways()[$detail->payment_gateway_name] ?? '' }}</td>
                    <td>{{ $detail->payment_gateway_key }}</td>
                    <td>{{ $detail->payment_gateway_secret }}</td>
                    <td>
                        <x-table-action url="payment-gateway-details" id="{{ $detail->uuid }}" route="payment-gateway-details" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
