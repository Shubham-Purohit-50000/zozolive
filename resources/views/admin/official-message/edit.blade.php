<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="official-messages" model="Official Message" />
    </x-slot>
    <x-form-body url="{{ 'official-messages/' . $officialMessage->uuid }}" method="PATCH" :upload="true" col="8">
        <x-form-input name="title" required="required" oldValue="{{ $officialMessage->title }}" />
        <x-form-input name="description" required="required" oldValue="{{ $officialMessage->description }}" />
        <x-image-input name="image" :imgPath="Storage::url($officialMessage->image)" />
    </x-form-body>
</x-layout>
