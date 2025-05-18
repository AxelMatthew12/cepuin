<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Sidebar extends Component
{

    public $links = [
        [
            'name' => 'Beranda',
            'link' => '/'
        ],
        [
            'name' => 'Trending',
            'link' => '/trending'
        ],
        [
            'name' => 'Statistik',
            'link' => '/statistik'
        ],
        [
            'name' => 'Notifikasi',
            'link' => '/notification'
        ],
        [
            'name' => 'Pengaturan',
            'link' => '/pengaturan'
        ]
    ];

    public function render()
    {
        return view('livewire.components.sidebar');
    }
}
