<?php

namespace Database\Seeders;

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
        \App\Models\Opinion::factory(5)->create();
        \App\Models\Service::factory(5)->create();
        \App\Models\Assessment::factory(5)->create();
    }
}
