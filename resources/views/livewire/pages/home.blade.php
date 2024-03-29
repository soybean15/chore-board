<?php

use function Livewire\Volt\{state, mount,on};

state(['user']);
mount(function () {
    $this->user = Auth::user();
});



on(['refresh-table' => function () {

      $this->dispatch('$refresh');
}]);


?>

<div>
    <x-header  title="Home" subtitle="Welcome, {{ auth()->user()->name }}" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>

        {{-- <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" />
        </x-slot:actions> --}}
    </x-header>

    <div class="flex flex-col items-start justify-center w-full px-0">


        @if ($this->user->families->isEmpty())
            <div class="flex flex-col items-center justify-center w-full" style="height: 250px">
                <div class="text-gray-500">"You haven't started a family yet. Shall we create one now?"

                </div>

                <livewire:components.createfamilymodal>
            </div>
        @else
        <div class="w-full">
            <livewire:components.familylist/>

        </div>
        @endif




    </div>
</div>
