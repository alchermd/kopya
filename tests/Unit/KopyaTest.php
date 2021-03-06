<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KopyaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_cant_create_new_kopyas()
    {
        $reponse = $this->json('POST', '/kopyas');

        $reponse->assertStatus(401);
    }

    /** @test */
    public function user_can_create_new_kopyas()
    {
        $user = factory(\App\User::class)->create();
        $kopya = factory(\App\Kopya::class)->make(['user_id' => $user->id]);

        $response = $this->actingAs($user)
                         ->json('POST', '/kopyas', $kopya->toArray());

        $response->assertStatus(302);
        $this->assertDatabaseHas('kopyas', $kopya->toArray());
    }
}
