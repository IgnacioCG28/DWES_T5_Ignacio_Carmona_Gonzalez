<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Box;
use App\Models\Item;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Factory Seeders (tarda un poco porque descarga las imagenes fake)
       /*   User::factory(5)->create();
        Box::factory(4)->create();
        Item::factory(30)->create();
        Loan::factory(4)->create();

        // Usuario para entrar y testear
        User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'test'
        ]);*/
        
         $this->call([
            UserSeeder::class,
            BoxSeeder::class,
            ItemSeeder::class,
            LoanSeeder::class
        ]);

    }
}
