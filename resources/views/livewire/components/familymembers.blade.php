<?php

use function Livewire\Volt\{state, mount, updated,uses};
use App\Models\Family;
use App\Models\User;
use App\Models\FamilyMember;
use Mary\Traits\Toast;

uses([Toast::class]);

state(['family','headers', 'members', 'addModal' => false, 'users' => [], 'selectedUsers' => [], 'searchText' => '']);

mount(function (Family $family) {
    $this->family = $family;
    $this->headers = [['key' => 'id', 'label' => '#'], ['key' => 'name', 'label' => 'Name'], ['key' => 'role', 'label' => 'Role']];
    $this->members = $family->members;
    $this->search();
});

$store = function () {

    foreach ($this->selectedUsers as $id) {
        # code...
        $user = User::find($id);
        FamilyMember::create([
            'family_id'=>$this->family->id,
            'user_id'=>$user->id,
            'name'=>$user->name,
            'role'=>'member'
    ]);

    }
    $this->members = $this->family->members;
    $this->addModal = false;
    $this->success('Successfully added '.sizeof($this->selectedUsers). ' members', position: 'toast-bottom toast-end');
};
$search = function (string $value = '') {

    $this->users = User::search($value)
        ->take(2)
        ->get();

};

$delete =function(FamilyMember $member){
    $member->delete();
    $this->error('User Deleted', position: 'toast-bottom toast-end');
    $this->members = $this->family->members;
}

?>


<div>

    <div class="flex justify-between">Members
        <x-modal wire:model="addModal" class="backdrop-blur" title="Add Member">
            <div class="pb-10 mb-5">
                <div class="">
                    <x-choices label="Search" hint="Search Multiple Users" wire:model="selectedUsers" :options="$users"
                        search-function="search" type="textarea" searchable />
                </div>



                <div class="my-3"> </div>


            </div>

            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.addModal = false" />
                <x-button label="Confirm" class="btn-primary" wire:click='store' />
            </x-slot:actions>

        </x-modal>

        <x-button label="Open" class="btn-primary" @click="$wire.addModal = true" />

    </div>

    <x-table :headers="$headers" :rows="$members" striped @row-click="alert($event.detail.name)" >

        @scope('actions', $member)
        <x-button icon="o-trash"  wire:confirm='Are you sure you want to delete this item?' wire:click="delete({{ $member->id }})" spinner class="btn-sm" />
    @endscope
    </x-table>
</div>
