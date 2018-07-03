<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class KopyaTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guest_cant_create_new_kopyas()
    {
        $reponse = $this->json('POST', '/kopyas', ['title' => 'New Kopya']);

        $reponse->assertStatus(401);
    }

    /** @test */
    public function user_can_create_new_kopyas()
    {
        $user = factory(\App\User::class)->create();
        $kopya = factory(\App\Kopya::class)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
                         ->json('POST', '/kopyas', $kopya->toArray());

        $response->assertStatus(200);
        $this->assertDatabaseHas('kopyas', $kopya->toArray());
    }
}
