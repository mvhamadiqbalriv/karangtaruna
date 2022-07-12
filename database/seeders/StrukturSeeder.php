<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Struktur;

class StrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Struktur::create([
            'foto' => '1.jpg'
        ]);
    }
}
