<?php

use function Livewire\Volt\{state};
use App\Models\Family;
state(['myModal' => false, 'familyName']);

$store = function (Family $family) {

    $this->validate([
        'familyName' => 'required|max:255',
    ]);

    $family->create([
        'name' => $this->familyName,
        'user_id' => auth()->user()->id,
    ]);

    $this->myModal = false;
    $this->familyName = '';

    $this->dispatch('refresh-table');

};

?>

<div>


    <x-button class="my-5 btn-primary" @click="$wire.myModal = true">
        Create
    </x-button>

    <x-modal wire:model="myModal" title="Create new family" subtitle="ex: My Family, Smith Family, Smiths" separator>
        <x-input label="Family Name" placeholder="Your family name" icon="o-users" wire:model='familyName' />

        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.myModal = false" />
            <x-button label="Confirm" class="btn-primary" wire:click='store' />
        </x-slot:actions>
    </x-modal>
</div>
