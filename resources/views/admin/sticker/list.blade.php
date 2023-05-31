<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Sticker" />
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
                <x-table-heading name="Sticker" />
                <x-table-heading name="Price" />
                <x-table-heading name="Created Date" />
                <x-table-heading name="Action" />
            </tr>
        </thead>
        <tbody>
            @foreach ($stickers as $sticker)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($sticker->image)
                            <x-file-icon url="{{ Storage::url($sticker->image) }}" />
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $sticker->price }}</td>
                    <td>{{ $sticker->created_at->format('d-m-Y') }}</td>
                    <td>
                        <x-table-action id="{{ $sticker->uuid }}" route="stickers">
                            <x-slot name="custombtn">
                                <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit"
                                    data-toggle="modal" data-target="#formModal"
                                    onclick="handleModal('{{ $sticker->uuid }}' , '{{ Storage::url($sticker->image) }}', '{{ $sticker->price }}')">
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
    'route' => 'stickers.store',
    'files' => true,
]) !!}
    <x-modal title="Add sticker">
        <input type="hidden" name="uuid" id="uuid">
        <x-image-input name="image"  />
        <x-form-input name="price"  />
    </x-modal>
    {!! Form::close() !!}

    <x-slot name="js">
        <script>
            function handleModal(id='',path ='', price = '') {
                uuid.value = id;
                document.querySelector('.image-input-wrapper').style=`background-image:url(${path})`
                document.getElementById('price').value = price
            }
            function handleCreateModal() {
                uuid.value = null;
            }
        </script>
    </x-slot>
</x-layout>