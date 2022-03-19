<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Default user
        User::factory()->create([
            'name'=> 'Sergio Diaz',
            'email'=> 'codediaz@todolist.com',
            'password'=> bcrypt('password')
        ]);
    }
}
