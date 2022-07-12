<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tentang;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tentang::create([
            'nama_karta' => 'Karang Taruna TALUN',
            'deskripsi' => 'Lorem ipsum met amet',
            'logo' => '1.jpg'
        ]);
    }
}
