<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicSeeder extends Seeder
{
    public function run()
    {
        $topics = [
            'Bencana & Lingkungan',
            'Kesehatan',
            'Kriminalitas & Keamanan',
            'Pelanggaran Hukum & HAM',
            'Infrastruktur & Fasilitas Umum',
            'Layanan Publik',
            'Pendidikan',
            'Sosial & Ekonomi',
            'Politik & Pemerintahan',
            'Transportasi & Lalu Lintas',
        ];

        foreach ($topics as $name) {
            Topic::create(['name' => $name]);
        }
    }
}
