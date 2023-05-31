<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="hosts" model="Host" />
    </x-slot>
    <x-form-body url="{{ route('models.update',$host->uuid) }}" method="PATCH" col="6" :upload="true">
        <x-form-input name="name" oldValue="{{ $host->user->name ?? '' }}" required="required" />
        <x-form-input name="email" label="E-Mail" oldValue="{{ $host->user->email ?? '' }}" required />
        <x-image-input name="avatar" :imgPath="storageUrl($host->user->avatar)" />
{{--        <x-form-input name="per_minute_price" oldValue="{{ $host->per_minute_price ?? 0 }}" required />--}}
        <x-form-datepicker name="dob" value="{{ $host->user->dob }}" />
        <x-password-input />
        <x-switch name="is_active" checked="{{ $host->user->is_active ? 'checked' : '' }}" />
    </x-form-body>
    <x-slot name="js">
        <script src="{{ asset('js/toggle-password.js') }}"></script>
    </x-slot>
</x-layout>
