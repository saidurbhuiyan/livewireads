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
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
         \App\Models\User::factory(100)->create();
       \App\Models\Website::factory(200)->create();
        \App\Models\SiteApp::factory(200)->create();
        \App\Models\Shortlink::factory(200)->create();
        \App\Models\Offerwall::factory(200)->create();
        \App\Models\BannerOption::factory(10)->create();
        \App\Models\PtcOption::factory(10)->create();

        for ($i = 0; $i <= 50; $i++){

            \App\Models\Network::factory(10000)->create();

            if ($i <= 20){
            \App\Models\Advertisement::factory(10000)->create();
        }

        }





    }
}
