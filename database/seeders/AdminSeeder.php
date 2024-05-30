<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert some stuff
        User::create([
                'email' => 'admin@example.com',
                'name'=> 'site admin',
                'username'=>'admin',
                'password'=> Hash::make("12345678"),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
           ])->assignRole('admin', 'publisher');
    }
}
