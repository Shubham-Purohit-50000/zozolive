<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Gift" />
    </x-slot>
    <x-table>
        <x-slot name="customCreateButton">
            <button type="button" class="btn btn-sm btn-success font-weight-bold mx-2" data-toggle="modal"
                data-target="#formModal" onclick="handleModal()">
                <i class="la la-plus"></i>
                Add New
            </button>
        </x-slot>
        <thead>
            <tr>
                <x-table-heading name="#" />
                <x-table-heading name="Gift" />
                <x-table-heading name="Coin" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($gifts as $gift)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($gift->image)
                            <x-file-icon url="{{ Storage::url($gift->image) }}" />
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $gift->coin }}</td>
                    <td>
                        <x-table-action id="{{ $gift->uuid }}" route="gifts">
                            <x-slot name="custombtn">
                                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit"
                                    data-toggle="modal" data-target="#formModal"
                                    onclick="handleModal('{{ $gift->uuid }}',{{ $gift->coin }})">
                                    <i class="la la-edit"></i>
                                </button>
                            </x-slot>
                        </x-table-action>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
    {!! Form::open([
        'method' => 'POST',
        'route' => 'gifts.store',
        'files' => true,
    ]) !!}
    <x-modal title="Add Gift">
        <input type="hidden" name="uuid" id="uuid">
        <x-form-input name="image" type="file" />
        <x-form-input name="coin" type="number" id="coins" required="required" />
    </x-modal>
    {!! Form::close() !!}

    <x-slot name="js">
        <script>
            function handleModal(id='', coin='') {
                uuid.value = id;
                coins.value = coin;
            }
        </script>
    </x-slot>
</x-layout>
