<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="pages" model="Host Category" />
    </x-slot>
    <x-form-body url="{{ 'category/' . $categories->uuid }}" method="PATCH" col="10" upload="true">
        <x-form-input name="title" required="required" oldValue="{{ $categories->title }}" />
        <label for="kt-ckeditor-1">Description<span class="text-danger">*</span></label>
        <textarea name="description" id="kt-ckeditor-1" class="form-contorl"
            autocomplete="off">{!! $categories->description !!}</textarea>

        <x-image-input name="icon" title="icon" imgPath="{{Storage::url($categories->icon)}}" />
    </x-form-body>
    <x-slot name="js">
        <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js') }}"></script>
    </x-slot>
</x-layout>
