<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeRouteTest extends TestCase
{
    /**
     * Test the root route.
     */
    public function test_root_route()
    {
        $response = $this->get('/');

        $response->assertStatus(200);         
    }
}
