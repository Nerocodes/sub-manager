<?php

namespace Tests\Feature;

use App\Models\Field;
use App\Models\Subscription;
use Database\Seeders\FieldSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function testCanCreateSubscription()
    {
        $this->seed(FieldSeeder::class);
        $field = Field::first();
        $data = [
            'email'=> 'test@gmail.com',
            'name'=> 'test',
            'fields'=> [
                [
                    'field_id'=> $field->id,
                    'value'=> 'No 1, test address'
                ]
            ]
        ];
        $response = $this->post('/api/subscriptions', $data);

        $response->assertStatus(201);
        $responseBody = $response->decodeResponseJson();
        $this->assertNotEmpty($responseBody['data']);
        $this->assertDatabaseHas('subscriptions', [
            'email' => $data['email']
        ]);
    }

    public function testCanUpdateSubscriptionState()
    {
        $this->seed(FieldSeeder::class);
        $field = Field::first();
        $data = [
            'email'=> 'test@gmail.com',
            'name'=> 'test',
            'fields'=> [
                [
                    'field_id'=> $field->id,
                    'value'=> 'No 1, test address'
                ]
            ]
        ];
        $response = $this->post('/api/subscriptions', $data);
        $responseBody = $response->decodeResponseJson();
        $subscription = $responseBody['data'];
        $stateData = [
            'state' => Subscription::ACTIVE
        ];
        $response = $this->patch('/api/subscriptions/' . $subscription['id'], $stateData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('subscriptions', [
            'state' => Subscription::ACTIVE
        ]);
    }

    public function testCanGetAllSubscriptions()
    {
        $this->seed(FieldSeeder::class);
        $field = Field::first();
        $data = [
            'email'=> 'test@gmail.com',
            'name'=> 'test',
            'fields'=> [
                [
                    'field_id'=> $field->id,
                    'value'=> 'No 1, test address'
                ]
            ]
        ];
        $this->post('/api/subscriptions', $data);
        $data2 = [
            'email'=> 'test2@gmail.com',
            'name'=> 'test2',
            'fields'=> [
                [
                    'field_id'=> $field->id,
                    'value'=> 'No 2, test2 address'
                ]
            ]
        ];
        $this->post('/api/subscriptions', $data2);
       
        $response = $this->get('/api/subscriptions');

        $response->assertStatus(200);
        $responseBody = $response->decodeResponseJson();
        $this->assertGreaterThan(1, count($responseBody['data']));
    }

    public function testCanGetSubscriptionById()
    {
        $this->seed(FieldSeeder::class);
        $field = Field::first();
        $data = [
            'email'=> 'test@gmail.com',
            'name'=> 'test',
            'fields'=> [
                [
                    'field_id'=> $field->id,
                    'value'=> 'No 1, test address'
                ]
            ]
        ];
        $response = $this->post('/api/subscriptions', $data);
        $responseBody = $response->decodeResponseJson();
        $subscription = $responseBody['data'];
        $response2 = $this->get('/api/subscriptions/' . $subscription['id']);
        $response2Body = $response2->decodeResponseJson();
        $response2->assertStatus(200);
        $this->assertEquals($data['email'], $response2Body['data']['email']);
    }
}
