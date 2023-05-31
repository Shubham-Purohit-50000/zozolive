<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="interests" model="Interest" />
    </x-slot>
    <x-form-body url="{{ route('interests.update',$interest->uuid) }}" method="PATCH" col="8">
        <x-form-input name="title" required="required" oldValue="{{ $interest->title ?? '' }}" />
        <x-form-textarea name="description" oldValue="{{ $interest->description ?? '' }}" />
    </x-form-body>
</x-layout>
