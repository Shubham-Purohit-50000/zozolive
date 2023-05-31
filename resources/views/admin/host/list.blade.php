<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Model" />
    </x-slot>
    <x-table url="models/create">
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Name" />
                <x-table-heading name="E-Mail" />
                <x-table-heading name="DOB" />
                <x-table-heading name="Studio Code" />
                <x-table-heading name="Avatar" />
{{--                <x-table-heading name="Video" />--}}
                <x-table-heading name="Is Active" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody x-data="init()">
            @foreach ($hosts as $host)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $host->user->name ?? '' }}</td>
                    <td class="text-lowercase">{{ $host->user->email ?? '' }}</td>
                    <td>{{ $host->user?->dob }}</td>
                    <td>{{ $host->agency->code ?? '' }}</td>
                    <td>
                        @if (filled($host->user) &&$host->user->avatar)
                            <x-file-icon url="{{ storageUrl($host->user->avatar) }}" />
                        @endif
                    </td>
{{--                    <td>--}}
{{--                        @if ($host->video)--}}
{{--                            <x-file-icon url="{{ storageUrl($host->video) }}" />--}}
{{--                        @endif--}}
{{--                    </td>--}}
                    <td>
                        @if (filled($host->user))
                            <x-link url="{{ 'update-user-status/' . $host->user->uuid }}"
                            title="{{ $host->user->is_active ? 'Yes' : 'No' }}"
                            class="{{ $host->user->is_active ? 'bg-success text-white' : 'bg-danger text-white' }}" />
                        @endif
                    </td>
                    <td>
                        <x-table-action url="models" id="{{ $host->uuid }}" route="models">
                            <x-slot name="custombtn">
                                <a href="{{ url("models/$host->uuid") }}"
                                    class="btn btn-sm btn-clean btn-icon btn-icon-md dropdown-item" title="Detail">
                                    <i class="la la-eye"></i>
                                </a>
                            </x-slot>
                        </x-table-action>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
