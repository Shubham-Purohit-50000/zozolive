<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="push-notifications" model="Push Notification" />
    </x-slot>
    <x-form-body route="push-notifications.store" :upload="true" method="POST" col="8">
        <x-form-input name="title" required="required" />
        <x-form-textarea name="description" />
        <x-form-single-select name="schedule" selectId="4" required :list="notificationSchedule()" />
        <x-image-input name="image" />
    </x-form-body>
</x-layout>
