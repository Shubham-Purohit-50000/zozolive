<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Feedback" />
    </x-slot>
    <x-table>
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="User Id" />
                <x-table-heading name="User Name" />
                <x-table-heading name="Description" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $feedback->user->user_id ?? '' }}</td>
                    <td>{{ $feedback->user->name ?? '' }}</td>
                    <td clas>{{ $feedback->description }}</td>
                    <td>
                        <x-table-action id="{{ $feedback->uuid }}" route="feedbacks" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
