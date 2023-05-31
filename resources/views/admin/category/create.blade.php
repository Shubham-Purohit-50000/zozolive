<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="category" model="Category" />
    </x-slot>
    <x-form-body route="category.store" method="POST" col="10" upload="true">
        <x-form-input name="title" required="required" />
        <label for="kt-ckeditor-1">Description<span class="text-danger">*</span></label>
        <textarea name="description" id="kt-ckeditor-1" class="form-contorl"
            autocomplete="off">{!! old('description') !!}</textarea>
<br>
        <x-image-input name="icon" title="icon" />
    </x-form-body>
    <x-slot name="js">
        <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js') }}"></script>
    </x-slot>
</x-layout>
