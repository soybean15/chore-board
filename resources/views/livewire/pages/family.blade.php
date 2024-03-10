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
    <x-tabs selected="member-tab">
        <x-tab name="chores-tab" label="Chores" icon="o-clipboard-document-list">

            <livewire:components.chores/>
        </x-tab>

        <x-tab name="merit-tab" label="Merits/Rewards" icon="o-gift-top">
            <div>Merits</div>
        </x-tab>
        <x-tab name="member-tab" label="Family Members" icon="o-users">

            <livewire:components.familymembers :family='$family'/>
        </x-tab>
    </x-tabs>


</div>
