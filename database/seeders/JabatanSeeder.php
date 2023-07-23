<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'name' => 'Web Developer',
        ]);

        Jabatan::create([
            'name' => 'Full Stack Developer',
        ]);

        Jabatan::create([
            'name' => 'Back End Developer',
        ]);

        Jabatan::create([
            'name' => 'Front End Developer',
        ]);

        Jabatan::create([
            'name' => 'IT Support',
        ]);

        Jabatan::create([
            'name' => 'Android Developer',
        ]);

        Jabatan::create([
            'name' => 'Data Enginer',
        ]);
    }
}
