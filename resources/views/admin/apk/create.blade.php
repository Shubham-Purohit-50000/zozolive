<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb model="Apk" />
    </x-slot>
    <x-form-body route="apk.store" :upload="true">
        <input type="hidden" value="{{ $apk->uuid ?? '' }}" name="uuid" />
        <x-form-input name="version_code" oldValue="{{ $apk->version_code ?? '' }}" type="number"
            required="required" />
        {{-- <x-form-input name="apk" type="file" /> --}}
        <input type="hidden" name="apk" id="apk" />
        <div class="dropzone dropzone-default dz-clickable" id="kt_dropzone_1">
            <div class="dropzone-msg dz-message needsclick">
                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                <span class="dropzone-msg-desc">This is just a demo dropzone. Selected files are
                    <strong>not</strong>actually uploaded.</span>
            </div>
        </div>
    </x-form-body>
    <x-slot name="js">
        <script src="{{ asset('assets/js/pages/crud/file-upload/dropzonejs.js') }}"></script>
        <script>
            var btn = document.getElementById('submit')
            btn.setAttribute('type', 'button');
            btn.style.cursor = 'not-allowed';
        </script>
    </x-slot>
</x-layout>
