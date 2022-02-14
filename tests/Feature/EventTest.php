<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    /** @test */
    public function deposit_into_existing_account()
    {
        $this->post('/reset');

        $data = [
            'type' => 'deposit',
            'destination' => 100,
            'amount' => 10
        ];

        $return = [
            "destination" => [
                "id" => 100,
                "balance" => 20
            ]
        ];

        
        $response = $this->post('/event', $data);

        $response->assertExactJson($return);

        $response->assertStatus(200);
    }
}
