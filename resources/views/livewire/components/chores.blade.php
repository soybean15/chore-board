<?php

use function Livewire\Volt\{state};

//

?>

<div>
    <div class="flex flex-col">
        <div class="flex flex-wrap items-center ">
            <x-stat title="Chores" value="44" icon="o-clipboard-document-list" tooltip="Total Chores" class="mx-1 my-1 w-60"/>
            <x-stat title="Pending" value="5" icon="o-clock" tooltip="Hello" color="text-gray-500"  class="mx-1 my-1 w-60"/>
            <x-stat title="On Going" value="44" icon="s-clock" tooltip="Hello" color="text-orange-500" class="mx-1 my-1 w-60"/>
            <x-stat title="Done" value="44" icon="s-check-circle" tooltip="Hello"  color="text-green-600"  class="mx-1 my-1 w-60"/>

        </div>

    </div>
</div>
