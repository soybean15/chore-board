<?php

use function Livewire\Volt\{state,mount};
use App\Models\Family;
//
state(['family']);
mount(function(Family $family){
    $this->family =Route::current()->parameters()['family']?? null;

});
?>

<div>
    <x-app-brand class="p-5 pt-3" />

    {{-- MENU --}}
    <x-menu activate-by-route>

        {{-- User --}}
        @if ($user = auth()->user())
            <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover
                class="mb-5 -mx-2 rounded">
                <x-slot:actions>
                    <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" link="/logout" />
                </x-slot:actions>
            </x-list-item>
        @endif

        <x-menu-item title="Home" icon="o-home" link="/" />

     @if($family)
     <x-menu-sub title="{{ $family->name }}" icon="o-users">
     </x-menu-sub>
     @endif
        <x-menu-sub title="Settings" icon="o-cog-6-tooth">
            <x-menu-item title="Wifi" icon="o-wifi" link="####" />
            <x-menu-item title="Archives" icon="o-archive-box" link="####" />
        </x-menu-sub>
    </x-menu>
</div>
