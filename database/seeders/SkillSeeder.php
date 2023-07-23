<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create([
            'name' => 'PHP',
        ]);

        Skill::create([
            'name' => 'Javascript',
        ]);

        Skill::create([
            'name' => 'HTML',
        ]);

        Skill::create([
            'name' => 'Bootstrap',
        ]);

        Skill::create([
            'name' => 'Tailwind CSS',
        ]);

        Skill::create([
            'name' => 'Code Igniter',
        ]);

        Skill::create([
            'name' => 'Laravel',
        ]);

        Skill::create([
            'name' => 'Node Js',
        ]);

        Skill::create([
            'name' => 'Angular Js',
        ]);

        Skill::create([
            'name' => 'MySQL',
        ]);

        Skill::create([
            'name' => 'PostgreSQL',
        ]);

        Skill::create([
            'name' => 'Flutter',
        ]);

        Skill::create([
            'name' => 'Firebase',
        ]);

        Skill::create([
            'name' => 'Network Administration',
        ]);

        Skill::create([
            'name' => 'Server Administration',
        ]);

        Skill::create([
            'name' => 'Document Administration',
        ]);

        Skill::create([
            'name' => 'Git',
        ]);

        Skill::create([
            'name' => 'Postman',
        ]);
    }
}
