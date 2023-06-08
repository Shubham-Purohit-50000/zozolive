<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="users" model="User" />
    </x-slot>
    <x-form-body url="{{ 'update/token/' . $user->uuid }}" method="POST">
        <x-form-input name="token" label="Token" oldValue="{{ $user->token }}" required="required" />
    </x-form-body>
    <x-table url="users/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Transaction Id" />
                <x-table-heading name="Token" />
                <x-table-heading name="Tnx Type" />
                <x-table-heading name="Date" />
            </tr>
        </thead>
        <tbody>
            {{--@foreach ($transactions as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id }}</td>
                    <td class="text-lowercase"><span class="text-success">+ </span>{{ $item->amount }}</td>
                    <td class="text-lowercase">Online</td>
                    <td class="text-lowercase">12 May, 2023</td>
                </tr>
            @endforeach--}}
        </tbody>
    </x-table>
</x-layout>
