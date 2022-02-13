<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    /** @test */
    public function reset_all_data_front_start_tests()
    {
        $response = $this->post('/reset');

        $response->assertStatus(200);
    }
}
