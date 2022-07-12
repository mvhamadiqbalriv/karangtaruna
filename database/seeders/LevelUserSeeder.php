<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'nama_level' => 'Anggota'
        ]);
        Level::create([
            'nama_level' => 'Pengurus'
        ]);
    }
}
