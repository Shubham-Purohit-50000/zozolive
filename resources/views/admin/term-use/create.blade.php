<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="term-of-use" model="Term Of Use" />
    </x-slot>
    <x-slot name="css">
        <x-select-css />
    </x-slot>
    <x-form-body route="term-of-use.store" method="POST" col="8">
        <x-form-input name="title" oldValue="{{ old('title') }}" required="required" />
        <x-form-input name="order" oldValue="{{ old('order') }}" required="required" type="number" />
       <label for="kt-ckeditor-1">Description<span class="text-danger">*</span></label>
        <textarea name="description" id="kt-ckeditor-1" class="form-contorl"
            autocomplete="off">{!! old('description') !!}</textarea>

    </x-form-body>
   <x-slot name="js">
        <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js') }}"></script>
    </x-slot>
</x-layout>
