<x-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb url="coins" model="Coin" />
    </x-slot>
    <x-form-body url="{{ 'coins/' . $coin->uuid }}" method="PATCH" :upload="true">
        <x-form-single-select name="type" :selected="$coin->type" selectId="4" required
            :list="packageType()" />
        <x-form-input name="amount" type="number" :oldValue="$coin->amount" required="required" />
        <x-form-input name="discount" :oldValue="$coin->discount" required="required" />
        <x-form-input name="coin" type="number" :oldValue="$coin->coin" required="required" />
    </x-form-body>
</x-layout>
