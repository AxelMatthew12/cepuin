<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Sidebar extends Component
{

    public $links = [];


    public function mount()
    {

        $this->links = [
            [
                'name' => 'Beranda',
                'link' => '/',
                'icon' => config('constants.icon.home')
            ],
            [
                'name' => 'Trending',
                'link' => '/trending',
                'icon' => config('constants.icon.trending')
            ],
            [
                'name' => 'Statistik',
                'link' => '/statistik',
                'icon' => config('constants.icon.statistic')
            ],
            [
                'name' => 'Notifikasi',
                'link' => '/notification',
                'icon' => config('constants.icon.notification')
            ],
            [
                'name' => 'Pengaturan',
                'link' => '/pengaturan',
                'icon' => config('constants.icon.setting')
            ]
        ];
        ;
    }

    public function render()
    {
        return view('livewire.components.sidebar');
    }
}