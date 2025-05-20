<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Search extends Component
{
    public function render()
    {
        return <<<'HTML'
         <search class="bg-primary-300 px-5 py-2 rounded-full flex items-center gap-1 w-full ">
            <span class="{{ config('constants.icon.search') }} size-6 text-secondary-200"></span>
            <input type="text" placeholder="Cari" class="bg-transparent focus:outline-none w-full">
        </search>
        HTML;
    }
}
