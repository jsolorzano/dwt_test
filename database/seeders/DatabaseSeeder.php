<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
		User::create([
            'name' => 'José',
            'last_name' => 'Solorzano',
            'email' => 'solorzano202009@gmail.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
            'is_staff' => true,
        ]);
        
        // \App\Models\User::factory(10)->create();
    }
}
