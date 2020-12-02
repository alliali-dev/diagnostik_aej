<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        //$this->call(RoleSeeder::class);
        //$this->call(AgenceSeeder::class);
        //$this->call(UserSeeder::class);
        //$this->call(CommuneSeeder::class);
        //$this->call(SecteuracitiviteSeeder::class);
        //$this->call(SpecialiteSeeder::class);
        $this->call(NiveauetudeSeeder::class);
    }
}
