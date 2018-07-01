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
        $reponse = $this->post('/kopyas', ['title' => 'New Kopya']);

        $reponse->assertStatus(302);
    }
}
