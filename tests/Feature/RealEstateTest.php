<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\RealEstate; 

class RealEstateTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $realEstate = RealEstate::factory()->create();
        $response = $this->getJson('/api/real-estates');

        $response->assertJsonFragment(['id' => $realEstate->id,'name' => $realEstate->name,'real_state_type' => 
                                    $realEstate->real_state_type,'city' => $realEstate->city,'country' => $realEstate->country]);
    }

    public function test_create()
    {
        $data = [
            'name' => 'Hill and Sons',
            'real_state_type' => 'house',
            'street' => 'Main St',
            'external_number' => '123',
            'neighborhood' => 'Downtown',
            'city' => 'Cityville',
            'country' => 'US',
            'rooms' => 3,
            'bathrooms' => 2.5,
        ];

        $response = $this->postJson('/api/real-estates', $data);
        $response->assertStatus(201)->assertJsonFragment(['name' => 'Hill and Sons']);
    }

    public function test_show()
    {
        $realEstate = RealEstate::factory()->create();
        $response = $this->getJson("/api/real-estates/{$realEstate->id}");

        $response->assertStatus(200)->assertJsonFragment(['id' => $realEstate->id]);
    }

    public function test_update()
    {
        $realEstate = RealEstate::factory()->create();
        $data = [
                    'name' => 'Updated Name',
                    'real_state_type' => 'house',
                    'street' => 'Main St',
                    'external_number' => '123',
                    'internal_number' => null,
                    'neighborhood' => 'Downtown',
                    'city' => 'Cityville',
                    'country' => 'US',
                    'rooms' => 3,
                    'bathrooms' => 2.5,
                    'comments' => null,
                ];

        $response = $this->putJson("/api/real-estates/{$realEstate->id}", $data);
        $response->assertStatus(200)->assertJsonFragment(['name' => 'Updated Name']);
    }

    public function test_destroy()
    {
        $realEstate = RealEstate::factory()->create();
        $response = $this->deleteJson("/api/real-estates/{$realEstate->id}");

        $response->assertStatus(200)->assertJsonFragment(['id' => $realEstate->id]);
    }
}
