<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guest_cant_access_dashboard()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }

    /** @test */
    public function auth_user_can_access_dashboard()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/home');

        $response->assertStatus(200);
    }
}
