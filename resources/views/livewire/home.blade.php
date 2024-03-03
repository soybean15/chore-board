<?php

use function Livewire\Volt\{state, mount};

state(['user']);
mount(function () {
    $this->user = Auth::user();
});

?>

<div>
    <x-header title="Hello, {{ auth()->user()->name }}" separator progress-indicator>
        <x-slot:middle class="!justify-end">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button label="Filters" @click="$wire.drawer = true" responsive icon="o-funnel" />
        </x-slot:actions>
    </x-header>

    <div class="flex items-center justify-center p-20 px-0 md:p-20">

        @if ($this->user->families->isEmpty())
          <div class="flex flex-col items-center w-40 h-40 py-20 md:p-20" >
            <div class="text-gray-500">"You haven't started a family yet. Shall we create one now?"

            </div>
            <x-button class="my-5 btn-primary">
                Start a Family
            </x-button>
          </div>
        @else
            // Collection is not empty
        @endif




    </div>
</div>
