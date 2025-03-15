<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RealEstate;

class RealEstateSeeder extends Seeder
{
    public function run(): void
    {
        RealEstate::factory()->count(20)->create();
    }
}
