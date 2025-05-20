<?php

namespace App\Livewire\Components;

use Livewire\Component;

class StatsSidebar extends Component
{
    public $topics = [
        [
            'name' => 'Politik',
            'post_count' => 400,
            'link' => ''
        ],
        [
            'name' => 'Pendidikan',
            'post_count' => 300,
            'link' => ''
        ],
        [
            'name' => 'Bencana',
            'post_count' => 200,
            'link' => ''
        ]
    ];

    public $regions = [
        [
            'name' => 'Jawa Timur',
            'post_count' => 400,
            'link' => ''
        ],
        [
            'name' => 'Jawa Barat',
            'post_count' => 300,
            'link' => ''
        ],
        [
            'name' => 'Jawa Tengah',
            'post_count' => 200,
            'link' => ''
        ],
        [
            'name' => 'Jakarta',
            'post_count' => 200,
            'link' => ''
        ]
    ];

    public function render()
    {
        return view('livewire.components.stats-sidebar');
    }
}
