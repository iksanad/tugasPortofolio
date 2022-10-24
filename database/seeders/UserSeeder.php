<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Akun Admin
        User::create([
		    'name' => 'admin',
		    'email' => 'admin@gmail.com',
		    'password' => bcrypt('123456'),
            'role' => 'admin'
		]);

        // Akun Walas
        User::create([
            'name' => 'Pak Lukman',
            'email' => 'walas@gmail.com',
            'password' => bcrypt('654321'),
            'role' => 'walas'
        ]);

        // Akun Siswa
        User::create([
            'name' => 'Iksan Arya',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('460449'),
            'role' => 'siswa'
        ]);
    }
}
