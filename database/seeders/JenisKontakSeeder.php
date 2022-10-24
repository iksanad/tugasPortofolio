<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\jenis_kontak;

class JenisKontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        jenis_kontak::create([
		    'jenis_kontak' => 'Email'
		]);

		jenis_kontak::create([
		    'jenis_kontak' => 'WhatsApp'
		]);

		jenis_kontak::create([
		    'jenis_kontak' => 'Instagram'
		]);
    }
}
