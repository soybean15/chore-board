<?php

use function Livewire\Volt\{state};
use \App\Models\User;
//

state([
    'form' => [
        'name' => '',
        'password' => '',
        'email' => '',
        'password_confirmation' => '',
    ],
]);

$save = function () {
    $this->validate([
        'form.name' => 'required',
        'form.email' => 'required|email|unique:users,email',
        'form.password' => 'required|confirmed',
        'form.password_confirmation' => 'required',
        //'form.password_confirmation' => 'required_with:password|same:password|min:6'
    ]);

    User::create($this->form);

    $this->redirect('login');
};

?>

<div>

    <x-header title="Sign up" separator progress-indicator>

        <x-slot:actions>
            <a href="/login" wire:navigate><x-button label="Login" responsive /></a>
        </x-slot:actions>
    </x-header>

    <div class="flex justify-center p-0 md:p-10 ">


        <x-form wire:submit="save" class="max-w-sm p-5 border rounded-lg">
            @if (session('message'))
                <x-alert icon="o-exclamation-triangle" class="alert-success">

                    {{ session('message') }}

                </x-alert>
            @endif
            @if (session('error'))
                <x-alert icon="o-exclamation-triangle" class="alert-warning">

                    {{ session('error') }}

                </x-alert>
            @endif
            <x-input label="Email" wire:model="form.email" type="email" icon="o-envelope" />
            <x-input label="Name" wire:model="form.name" type="text" icon="o-user" />

            <x-input label="Password" wire:model="form.password" type="password" icon="m-eye-slash" />
            <x-input label="Confirm Password" wire:model="form.password_confirmation" type="password"
                icon="m-eye-slash" />

            <x-slot:actions>
                <x-button label="Cancel" />
                <x-button label="Sign up" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </div>
</div>
