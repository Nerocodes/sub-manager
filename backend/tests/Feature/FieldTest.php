<?php

namespace Tests\Feature;

use Database\Seeders\FieldSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FieldTest extends TestCase
{
    use RefreshDatabase;

    public function testCanGetAllFields()
    {
        $this->seed(FieldSeeder::class);
        $response = $this->get('/api/fields');

        $response->assertStatus(200);
        $responseBody = $response->decodeResponseJson();
        $this->assertGreaterThan(0, count($responseBody['data']));
    }
}
