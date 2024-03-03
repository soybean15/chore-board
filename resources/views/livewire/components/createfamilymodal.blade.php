<?php

use function Livewire\Volt\{state, on,uses};
use App\Models\Family;
use Mary\Traits\Toast;

uses([Toast::class]);
state([
    'myModal' => false,
    'familyName',
    'onEdit' => false,
    'family',
]);


$open = function (){
    $this->myModal = true;
    $this->onEdit = false;
};

$store = function (Family $family) {
    $this->validate([
        'familyName' => 'required|max:255',
    ]);

    if (!$this->onEdit) {
        $family->create([
            'name' => $this->familyName,
            'user_id' => auth()->user()->id,
        ]);

        $this->success('Item Successfully Created', position: 'toast-bottom toast-end');
    } else {
        $this->family->update([
            'name' => $this->familyName,
        ]);

        $this->success('Item Successfully Updated', position: 'toast-center toast-end');

    }


    $this->onEdit =false;
    $this->myModal = false;
    $this->familyName = '';

    $this->dispatch('refresh-table');
};

on([
    'open-create-family-modal' => function (Family $family) {
        $this->family = $family;
        $this->onEdit = true;
        $this->familyName = $family->name;
        $this->myModal = true;
    },
]);

?>

<div>


    <x-button class="my-5 btn-primary" wire:click="open">
        Create
    </x-button>

    <x-modal wire:model="myModal" title="{{ !$onEdit ? 'Create new family':'Update family' }} " subtitle="ex: My Family, Smith Family, Smiths" separator>
        <x-input label="Family Name" placeholder="Your family name" icon="o-users" wire:model='familyName' />

        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.myModal = false" />
            <x-button label="Confirm" class="btn-primary" wire:click='store' />
        </x-slot:actions>
    </x-modal>
</div>
