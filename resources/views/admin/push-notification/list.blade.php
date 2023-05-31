<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Push Notification" />
    </x-slot>
    <x-table url="push-notifications/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Title" />
                <x-table-heading name="Description" />
                <x-table-heading name="Schedule" />
                <x-table-heading name="Image" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $notification->title }}</td>
                    <td>{{ $notification->description }}</td>
                    <td>{{ notificationSchedule()[$notification->schedule] }}</td>
                    <td>
                        @if ($notification->image)
                            <x-file-icon url="{{ Storage::url($notification->image) }}" />
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <x-table-action url="push-notifications" id="{{ $notification->uuid }}" route="push-notifications" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
