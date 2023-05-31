<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="pages" model="Page" />
    </x-slot>
    <x-form-body url="{{ 'pages/' . $page->uuid }}" method="PATCH" col="10">
        <x-form-input name="title" required="required" oldValue="{{ $page->title }}" />
        <label for="kt-ckeditor-1">Content<span class="text-danger">*</span></label>
        <textarea name="content" id="kt-ckeditor-1" class="form-contorl"
            autocomplete="off">{!! $page->content !!}</textarea>
    </x-form-body>
    <x-slot name="js">
        <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/pages/crud/forms/editors/ckeditor-classic.js') }}"></script>
    </x-slot>
</x-layout>
