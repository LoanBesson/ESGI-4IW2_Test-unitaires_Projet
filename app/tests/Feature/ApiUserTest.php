<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testUser1IsPresent()
    {
        $response = $this->get('/api/user/1');

        $response->assertStatus(200);
    }

    public function testGetUsers()
    {
        $response = $this->get('/api/users');

        $response->assertStatus(200);
    }
}
