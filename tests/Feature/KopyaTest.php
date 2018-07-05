<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KopyaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_new_kopyas()
    {
        $user = factory(\App\User::class)->create();
        $kopya = factory(\App\Kopya::class)->make(['user_id' => $user->id]);

        $response = $this->actingAs($user)
                         ->get('/kopyas/create');

        $response->assertSee('New Kopya');

        $response = $this->actingAs($user)
                         ->post('/kopyas', $kopya->toArray());

        $response->assertStatus(302);
        $this->assertDatabaseHas('kopyas', $kopya->toArray());
    }

    /** @test */
    public function user_can_browse_kopyas()
    {
        $user = factory(\App\User::class)->create();
        $kopyas = factory(\App\Kopya::class, 5)->create();

        $response = $this->actingAs($user)
                         ->get('/kopyas');

        $response->assertSee('Browse');

        $kopyas->each(function ($kopya) use ($response) {
            $response->assertSee($kopya->title);
        });
    }
}
