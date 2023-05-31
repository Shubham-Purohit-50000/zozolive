<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="push-notifications" model="Push Notification" />
    </x-slot>
    <x-form-body url="{{ 'push-notifications/' . $pushNotification->uuid }}" method="PATCH" :upload="true" col="8">
        <x-form-input name="title" oldValue="{{ $pushNotification->title }}" required="required" />
        <x-form-textarea name="description" oldValue="{{ $pushNotification->description }}" />
        <x-form-single-select name="schedule" selectId="4" required :selected="$pushNotification->schedule"
            :list="notificationSchedule()" />
        <x-image-input name="image" imgPath="{{ Storage::url($pushNotification->image) }}" />
    </x-form-body>
</x-layout>
