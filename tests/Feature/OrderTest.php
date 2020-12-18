<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
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

    /** @test */
    public function orderCreate()
    {
        $this->withExceptionHandling();
        $this->withoutMiddleware();

        $user = User::first();
        $response = $this->actingAs($user)->post(route('orders.store'));
        $response->assertOk();
    }
}
