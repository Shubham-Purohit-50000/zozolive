<x-layout>

    <x-slot name="breadcrumb">
        <x-breadcrumb url="users" model="User" />
    </x-slot>

    <x-form-body url="{{ 'update/token/' . $user->uuid }}" method="POST" title="Current Token : ₹{{$user->token}}">
        <x-form-select-single name="coin_id" label="Add Token" :list="$coin" />
    </x-form-body>

    <x-table>
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Transaction Id" />
                <x-table-heading name="Amount" />
                <x-table-heading name="Token" />
                <x-table-heading name="Tnx Type" />
                <x-table-heading name="Status" />
                <x-table-heading name="Date" />
            </tr>
        </thead>
        <tbody>
            @foreach ($recharge as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->uuid }}</td>
                    <td class="text-lowercase"><span class="text-success">₹ </span>{{ $item->amount }}</td>
                    <td class="text-lowercase"><span class="text-success">+ </span>{{ $item->coin }}</td>
                    <td class="text-lowercase">{{$item->type}}</td>
                    <td class="text-lowercase">{{$item->status}}</td>
                    <td class="text-lowercase">{{date_formater($item->created_at)}}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>

</x-layout>
