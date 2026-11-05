<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rute')->insert([
            [
                'kode' => 'TL-01',
                'nama_rute' => 'Majalaya - Jatinangor',
                'asal' => 'Majalaya',
                'tujuan' => 'Jatinangor',
                'foto_rute' => 'https://picsum.photos/300/200?random=1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'TL-02',
                'nama_rute' => 'Ciakar - Jatinangor',
                'asal' => 'Terminal Ciakar',
                'tujuan' => 'Jatinangor',
                'foto_rute' => 'https://picsum.photos/300/200?random=2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode' => 'TL-03',
                'nama_rute' => 'Ciakar - Bandung Kota',
                'asal' => 'Terminal Ciakar',
                'tujuan' => 'Bandung Kota',
                'foto_rute' => 'https://picsum.photos/300/200?random=3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}