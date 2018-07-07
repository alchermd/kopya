<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KopyaTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\User */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(\App\User::class)->create();
    }

    /** @test */
    public function user_can_create_new_kopyas()
    {
        $kopya = factory(\App\Kopya::class)->make(['user_id' => $this->user->id]);

        $response = $this->actingAs($this->user)
                         ->get('/kopyas/create');

        $response->assertSee('New Kopya');

        $response = $this->actingAs($this->user)
                         ->post('/kopyas', $kopya->toArray());

        $response->assertStatus(302);
        $this->assertDatabaseHas('kopyas', $kopya->toArray());
    }

    /** @test */
    public function user_can_browse_kopyas()
    {
        $kopyas = factory(\App\Kopya::class, 5)->create();

        $response = $this->actingAs($this->user)
                         ->get('/kopyas');

        $response->assertSee('Browse');

        $kopyas->each(function ($kopya) use ($response) {
            $response->assertSee($kopya->title);
        });
    }

    /** @test */
    public function user_can_browse_a_specific_kopya()
    {
        $kopya = factory(\App\Kopya::class)->create();

        $response = $this->actingAs($this->user)
                         ->get('/kopyas/' . $kopya->id);

        $response->assertStatus(200);
        $response->assertSee($kopya->title);
    }
}
