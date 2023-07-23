<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Countries;
use App\Models\District;
use App\Models\Jabatan;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();
        Countries::factory(5)->create();
        Cities::factory(10)->create();
        District::factory(30)->create();

        $this->call([
            JabatanSeeder::class,
            SkillSeeder::class,
        ]);

        User::create([
            'jobs_id' => 2,
            'name' => 'Rizal Prabaswara',
            'email' => 'rizalbaya34@gmail.com',
            'password' => bcrypt(12345),
            'phone' => '085735565068',
            'year' => 2000,
            'countries_id' => 2,
            'cities_id' => 6,
            'districts_id' => 15,
            'deskripsi' => 'asdgsjdgasgdyashguydgbyuhabwbdyy',
            'image' => '18410100131.jpg',
        ]);
    }
}
