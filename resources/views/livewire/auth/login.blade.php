<?php

use function Livewire\Volt\{state};

state([
    'form' => [
        'email' => '',
        'password' => '',
        'remember_me' => false,
    ],
]);

$save = function () {
    $this->validate(
        [
            'form.email' => 'required|email',
            'form.password' => 'required',
        ],
        [
            'form.email.required' => 'Email field is required',
            'form.password.required' => 'Password field is required',
        ],
    );

    if (\Auth::attempt(['email' => $this->form['email'], 'password' => $this->form['password']])) {
        return redirect(route('home'));
    } else {
        session()->flash('error', 'email and password are wrong.');
    }
};

?>

<div>


    <x-header title="Sign in" separator progress-indicator>

        <x-slot:actions>
            <a href="/register" wire:navigate><x-button label="Register" responsive /></a>
        </x-slot:actions>
    </x-header>

    <div class="flex items-center justify-center p-20 ">


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
            <x-input label="Password" wire:model="form.password" type="password" icon="m-eye-slash" />

            <x-slot:actions>
                <x-button label="Cancel" />
                <x-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </div>
</div>
