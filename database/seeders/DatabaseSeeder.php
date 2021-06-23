<?php

namespace Database\Seeders;

use App\Models\Company;
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
        Company::factory(100)->create()->each(function ($company){ 
            $company->users()
            ->createMany(User::factory(10)->make()->map->getAttributes());
        });    
    }
}
