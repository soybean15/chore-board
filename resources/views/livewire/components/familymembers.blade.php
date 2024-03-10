<?php

use function Livewire\Volt\{state,mount};
use App\Models\Family;

//

state([
    'headers',
'members',
'addModal'=>true]);
mount(function(Family $family){
    $this->headers= [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Nice Name'],
        ['key' => 'city.name', 'label' => 'City'] # <---- nested attributes
    ];
    $this->members= $family->members;

});

?>


<div>

    <div class="flex justify-between">Members
        <x-modal wire:model="addModal" class="backdrop-blur" title="Add Member">
            <div class="mb-5">
                <x-input label="Search" placeholder="Search" icon="o-magnifying-glass" hint="Search Existing User" />

                <div class="my-3"> </div>

                <x-input label="Name" placeholder="Name" icon="o-user" hint="Search User" />

            </div>
            <x-button label="Cancel" @click="$wire.addModal = false" />
        </x-modal>

        <x-button label="Open" class="btn-primary"  @click="$wire.addModal = true" />

    </div>

    <x-table :headers="$headers" :rows="$members" striped @row-click="alert($event.detail.name)" />
</div>
