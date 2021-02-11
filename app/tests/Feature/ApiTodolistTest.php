<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTodolistTest extends TestCase
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

    public function testTodolist1IsPresent()
    {
        $response = $this->get('/api/todolist/1');

        $response->assertStatus(200);
    }

    public function testGetTodolists()
    {
        $response = $this->get('/api/todolists');

        $response->assertStatus(200);
    }
}
