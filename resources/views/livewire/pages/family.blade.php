<?php

use function Livewire\Volt\{state, mount};
use App\Models\Family;


state(['family']);

mount(function(Family $family){
    $this->family = $family;

});

?>

<div>
    <x-header  title="{{ $this->family->name }}" subtitle="Welcome, {{ auth()->user()->name }}" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>

        {{-- <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" />
        </x-slot:actions> --}}
    </x-header>

    <div class="flex flex-col">
        <div class="flex items-center ">
            <x-stat title="Chores" value="44" icon="o-clipboard-document-list" tooltip="Total Chores" class="mx-1 my-1 w-80"/>
            <x-stat title="Pending" value="5" icon="o-clock" tooltip="Hello" color="text-gray-500"  class="mx-1 my-1 w-80"/>
            <x-stat title="On Going" value="44" icon="s-clock" tooltip="Hello" color="text-orange-500" class="mx-1 my-1 w-80"/>
            <x-stat title="Done" value="44" icon="s-check-circle" tooltip="Hello"  color="text-green-600"  class="mx-1 my-1 w-80"/>

        </div>

    </div>
</div>
