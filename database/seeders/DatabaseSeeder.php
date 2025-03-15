<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RealEstateSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RealEstateSeeder::class);
    }
}
